<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;

if (!function_exists('validateOperatings')) {
    function validateOperatings(Collection $operatings): array {
        if (empty($operatings->get(0)) || empty($operatings->get(1))) {
            throw new Exception('One of the operands is not present.');
        }

        if (!is_numeric($operatings->get(0)) || !is_numeric($operatings->get(1))) {
            throw new Exception('One of the operands is not a valid number.');
        }

        $firstOperating = (float) $operatings->get(0);
        $secondOperating = (float) $operatings->get(1);

        if(is_nan($firstOperating) || is_nan($secondOperating)) {
            throw new Exception('The operation is not valid.');
        }

        return [
            $firstOperating,
            $secondOperating
        ];
    }
}

if (!function_exists('addition')) {
    function addition(Stringable $operation): string
    {
        $operatings = validateOperatings($operation->split('/[\+]+/'));
        $result =  $operatings[0] + $operatings[1];

        return (string) $result;
    }
}

if (!function_exists('subtraction')) {
    function subtraction(Stringable $operation): string
    {
        $operatings = validateOperatings($operation->split('/[\-]+/'));
        $result = $operatings[0] - $operatings[1];

        return (string) $result;
    }
}

if (!function_exists('division')) {
    function division(Stringable $operation): string
    {
        $operatings = validateOperatings($operation->split('/[\/]+/'));
        if ($operatings[1] == 0) {
            throw new Exception('Division by zero is not allowed.');
        }
        $result = $operatings[0] / $operatings[1];

        return (string) $result;
    }
}

if (!function_exists('multiplication')) {
    function multiplication(Stringable $operation): string
    {
        $operatings = validateOperatings($operation->split('/[\*]+/'));
        $result = $operatings[0] * $operatings[1];

        return (string) $result;
    }
}
