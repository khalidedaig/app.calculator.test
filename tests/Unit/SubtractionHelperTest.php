<?php

namespace Tests\Unit;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use PHPUnit\Framework\TestCase;

class SubtractionHelperTest extends TestCase
{
    /**
     * Test that the subtraction result is returning a value
     *
     * @return void
     */
    public function test_subtraction_helper_is_returning_a_value()
    {
        $operation = Str::of('8-4')->trim();
        $result = subtraction($operation);

        $this->assertInstanceOf(Stringable::class, $operation);
        $this->assertIsString($result);
    }

    /**
     * Test that the subtraction result is returning a value that can be converted to an integer
     *
     * @return void
     */
    public function test_subtraction_helper_is_returning_a_value_that_can_be_converted_to_an_integer()
    {
        $operation = Str::of('8-4')->trim();
        $result = (int) (subtraction($operation));

        $this->assertIsInt($result);
    }

    /**
     * Test that the subtraction result is working
     *
     * @return void
     */
    public function test_subtraction_helper_is_working()
    {
        $operation = Str::of('8-4')->trim();
        $result = (int) (subtraction($operation));

        $this->assertEquals(4, $result);
    }

    /**
     * Test that the subtraction result is nor working with wrong values
     *
     * @return void
     */
    public function test_subtraction_helper_is_not_working_with_wrong_values()
    {
        $operation = Str::of('8-4')->trim();
        $result = (int) (subtraction($operation));

        $this->assertNotEquals(8, $result);
    }
}
