<?php

namespace App\Services;

use App\Models\Operations as OperationsModel;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Enums\HttpResponses;
use App\Services\OperationHandler as OperationHandler;
use Exception;

class Calculator
{
    public function __construct(
        private OperationHandler $operation
    ) {
        $this->operation = new OperationHandler();
    }

    public function index(OperationsModel $operationModel): JsonResponse
    {
        try {
            $operations = $this->operation->getMostRecentOperations($operationModel);

            return response()->json($operations, HttpResponses::HTTP_RESPONSE_OK->value);
        } catch (Exception $exception) {
            $response = ['error' => $exception->getMessage()];

            return response()->json($response, HttpResponses::HTTP_RESPONSE_BAD_REQUEST->value);
        }
    }

    public function create(): View
    {
        return view('app');
    }

    public function store(Request $request, OperationsModel $operationModel): JsonResponse
    {
        try {
            $response = $this->operation->storeAnOperation($request, $operationModel);

            return response()->json($response, HttpResponses::HTTP_RESPONSE_CREATED->value);
        } catch (Exception $exception) {
            $response = [
                'error' => 'Operation not allowed',
                'exception' => $exception->getMessage(),
                'operation' => $request->get('operation'),
            ];

            return response()->json($response, HttpResponses::HTTP_RESPONSE_BAD_REQUEST->value);
        } catch (Exception $exception) {
            $response = [
                'error' => 'Calculation Error',
                'exception' => $exception->getMessage(),
                'operation' => $request->get('operation'),
            ];

            return response()->json($response, HttpResponses::HTTP_RESPONSE_BAD_REQUEST->value);
        }
    }

    public function delete(OperationsModel $operationModel): JsonResponse
    {
        try {
            $response = $this->operation->deleteAnOperation($operationModel);

            return response()->json($response, HttpResponses::HTTP_RESPONSE_OK->value);
        } catch (Exception $exception) {
            $response = ['result' => $exception->getMessage()];

            return response()->json($response, HttpResponses::HTTP_RESPONSE_BAD_REQUEST->value);
        }
    }

    public function destroy(OperationsModel $operationsModel): JsonResponse
    {
        try {
            $response = $this->operation->destroyAllOperations($operationsModel);

            return response()->json($response, HttpResponses::HTTP_RESPONSE_OK->value);
        } catch (ModelNotFoundException $exception) {
            $response = ['result' => $exception->getMessage()];

            return response()->json($response, HttpResponses::HTTP_RESPONSE_NOT_FOUND->value);
        } catch (Exception $exception) {
            $response = ['result' => $exception->getMessage()];

            return response()->json($response, HttpResponses::HTTP_RESPONSE_BAD_REQUEST->value);
        }
    }
}
