<?php


namespace App\Services;

use App\Models\Operations as OperationsModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Stringable;

class OperationHandler
{
    public function getOperationToExecuteFromRequest(string $operation): Stringable
    {
        return Str::of($operation)->trim();
    }

    public function getResultFromOperation(Stringable $operation): string
    {
        if($operation->contains('+')) {
            return addition($operation);
        }

        if($operation->contains('-')) {
            return subtraction($operation);
        }

        if($operation->contains('*')) {
            return multiplication($operation);
        }

        if($operation->contains('/')) {
            return division($operation);
        }

        throw new Exception('There\'s not a valid operation to do.');
    }

    /**
     * @param OperationsModel $operationModel
     * @return Collection
     * @throws Exception
     */
    public function getMostRecentOperations(OperationsModel $operationModel): Collection
    {
        $operations = $operationModel->take(10)->get();

        if (empty($operations)) {
            throw new Exception('No operations found.');
        }

        return $operations;
    }

    /**
     * @param Request $request
     * @param OperationsModel $operationModel
     * @return array
     * @throws Exception
     */
    public function storeAnOperation(Request $request, OperationsModel $operationModel): array
    {
        $operationToExecute = $this->getOperationToExecuteFromRequest($request->get('operation'));
        
        $result = $this->getResultFromOperation($operationToExecute);

        $response = [
            'operation' => $operationToExecute,
            'result' => $result,
            'updated_date' => today(),
        ];

        if(!$operationModel->create($response)) {
            throw new Exception('Operation can\'t be stored properly.');
        }

        return $response;
    }

    /**
     * @param OperationsModel $operationModel
     * @return string[]
     * @throws Exception
     */
    public function deleteAnOperation(OperationsModel $operationModel): array
    {
        if (!$operationModel->delete()) {
            throw new Exception('Operation deletion failed.');
        }

       return [ 'result' => 'Operation deleted' ];
    }

    /**
     * @return string[]
     * @throws Exception
     */
    public function destroyAllOperations(OperationsModel $operationsModel): array
    {
        $operations = $operationsModel->all()->modelKeys();

        if (empty($operations)) {
            throw new ModelNotFoundException('There\'s no operations to delete.');
        }

        if (!$operationsModel->destroy($operations)) {
            throw new Exception('Operations deletion failed.');
        }

        return $response = [ 'result' => 'Operations deleted.' ];
    }
}
