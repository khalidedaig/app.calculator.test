<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test that calculator is accesible
     *
     * @return void
     */
    public function test_calculator_is_accesible()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('Calculator')
            ->assertSee('Do something 🤖');
    }
}
