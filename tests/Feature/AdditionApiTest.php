<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdditionApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test making an API request to store an addition
     *
     * @return void
     */
    public function test_making_an_api_request_to_store_an_addition()
    {
        $operation = '4+4';
        $result = '8';
        $response = $this->postJson('/api/operations', [ 'operation' => $operation ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'operation' => $operation,
                'result' => $result,
                'updated_date' => today()->toJSON(),
            ]);
    }

    /**
     * Test making an API request to check if addition stored value is correct
     *
     * @return void
     */
    public function test_making_an_api_request_to_check_if_addition_stored_value_is_correct()
    {
        $operation = '4+4';
        $result = '8';
        $response = $this->postJson('/api/operations', [ 'operation' => $operation ]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'operation',
                'result',
                'updated_date',
            ])
            ->assertJson([
                'operation' => $operation,
                'result' => $result,
                'updated_date' => today()->toJSON(),
            ]);
    }

    /**
     * Test making an API request to check if addition stored value is incorrect
     *
     * @return void
     */
    public function test_making_an_api_request_to_check_if_addition_stored_value_is_incorrect()
    {
        $operation = '4+4';
        $result = '12';
        $response = $this->postJson('/api/operations', [ 'operation' => $operation ]);

        $response
            ->assertStatus(201)
            ->assertJsonMissingExact([
                'result' => $result,
            ]);
    }
}
