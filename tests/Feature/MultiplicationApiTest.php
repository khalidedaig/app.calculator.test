<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MultiplicationApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test making an API request to store an multiplication
     *
     * @return void
     */
    public function test_making_an_api_request_to_store_a_multiplication()
    {
        $operation = '8*4';
        $result = '32';
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
     * Test making an API request to check if multiplication stored value is correct
     *
     * @return void
     */
    public function test_making_an_api_request_to_check_if_multiplication_stored_value_is_correct()
    {
        $operation = '8*4';
        $result = '32';
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
     * Test making an API request to check if multiplication stored value is incorrect
     *
     * @return void
     */
    public function test_making_an_api_request_to_check_if_multiplication_stored_value_is_incorrect()
    {
        $operation = '8*4';
        $result = '12';
        $response = $this->postJson('/api/operations', [ 'operation' => $operation ]);

        $response
            ->assertStatus(201)
            ->assertJsonMissingExact([
                'result' => $result,
            ]);
    }
}
