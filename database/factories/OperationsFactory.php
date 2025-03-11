<?php

namespace Database\Factories;

use App\Models\Operations;
use App\Services\OperationHandler;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Request;

class OperationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Operations::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $operationRequest = (string) ($this->faker->numberBetween(1, 10) . $this->faker->randomElement(['+', '-', '*', '/']) . $this->faker->numberBetween(1, 10));
        $operationHandler = new OperationHandler();
        $operation = $operationHandler->getOperationToExecuteFromRequest($operationRequest);
        $result = $operationHandler->getResultFromOperation($operation);

        return [
            'operation' => $operation,
            'result' => $result,
            'updated_date' => today(),
        ];
    }
}
