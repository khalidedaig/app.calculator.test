<?php

namespace Tests\Feature;

use App\Models\Operations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test try to retrieve a list of stored operations
     *
     * @return void
     */
    public function test_try_to_retrieve_a_list_of_stored_operations()
    {
        $operation = '2*2';
        $result = '4';

        $this->postJson('/api/operations', [ 'operation' => $operation ])
            ->assertStatus(201)
            ->assertJson([
                'operation' => $operation,
                'result' => $result,
                'updated_date' => today()->toJSON(),
            ]);

        $response = $this->getJson('/api/operations')
            ->assertStatus(200)
            ->assertJsonFragment([
                'operation' => $operation,
                'result' => $result,
                'updated_date' => today()->toJSON(),
            ]);
    }

    /**
     * Test making an API request to store an operation
     *
     * @return void
     */
    public function test_making_an_api_request_to_store_an_operation()
    {
        $operation = '1+2';
        $result = '3';

        $this->postJson('/api/operations', [ 'operation' => $operation ])
            ->assertStatus(201)
            ->assertJson([
                'operation' => $operation,
                'result' => $result,
                'updated_date' => today()->toJSON(),
            ]);
    }

    /**
     * Test making an API request to store an operation with no operation sign
     *
     * @return void
     */
    public function test_making_an_api_request_to_store_an_operation_with_no_operation_sign()
    {
        $operation = '12';

        $this->postJson('/api/operations', [ 'operation' => $operation ])
            ->assertStatus(400)
            ->assertJson([
                'error' => 'Operation not allowed',
                'exception' => 'There\'s not a valid operation to do.',
                'operation' => $operation,
            ]);
    }

    /**
     * Test making an API request to store an operation with letters
     *
     * @return void
     */
    public function test_making_an_api_request_to_store_an_operation_with_letters()
    {
        $operation = 'abc';

        $this->postJson('/api/operations', [ 'operation' => $operation ])
            ->assertStatus(400)
            ->assertJson([
                'error' => 'Operation not allowed',
                'exception' => 'There\'s not a valid operation to do.',
                'operation' => $operation,
            ]);
    }

    /**
     * Test making an API request to store an operation with a number and a letter
     *
     * @return void
     */
    public function test_making_an_api_request_to_store_an_operation_with_a_number_and_a_letter()
    {
        $operation = 'a+2';

        $this->postJson('/api/operations', [ 'operation' => $operation ])
            ->assertStatus(400)
            ->assertJson([
                'error' => 'Operation not allowed',
                'exception' => 'One of the operands is not a valid number.',
                'operation' => $operation,
            ]);
    }

    /**
     * Test making an API request to store an operation with a number and a letter
     *
     * @return void
     */
    public function test_making_an_api_request_to_store_an_operation_with_only_number_and_a_letter()
    {
        $operation = '2+';

        $this->postJson('/api/operations', [ 'operation' => $operation ])
            ->assertStatus(400)
            ->assertJson([
                'error' => 'Operation not allowed',
                'exception' => 'One of the operands is not present.',
                'operation' => $operation,
            ]);
    }

    /**
     * Test try to retrieve a list of stored operations after delete all the operations
     *
     * @return void
     */
    public function test_try_to_retrieve_a_list_of_stored_operations_after_delete_all_the_operations()
    {
        $operations = Operations::factory()->count(10)->create();

        $this->deleteJson('/api/operations');

        $this->getJson('/api/operations')
            ->assertStatus(200)
            ->assertJsonMissing([
                'operation' => $operations->get(0)->operation,
                'result' => $operations->get(0)->result,
                'updated_date' => today()->toJSON(),
            ]);
    }

    /**
     * Test try to retrieve a list of stored operations after delete one operation
     *
     * @return void
     */
    public function test_try_to_retrieve_a_list_of_stored_operations_after_delete_one_operation()
    {
        $operations = Operations::factory()->count(10)->create();

        $this->deleteJson('/api/operations/' . $operations[0]->id);

        $this->getJson('/api/operations')
            ->assertStatus(200)
            ->assertJsonMissingExact([
                'id' => $operations[0]->id,
                'operation' => $operations[0]->operation,
                'result' => $operations[0]->result,
                'updated_date' => $operations[0]->updated_date,
            ]);
    }
}
