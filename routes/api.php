<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Middleware\HasOperation;


Route::controller(CalculatorController::class)->group(function () {
    Route::get('/operations', 'index');

    Route::post('/operations', 'store')->middleware([HasOperation::class]);

    Route::delete('/operations/{operations}', 'delete');

    Route::delete('/operations', 'destroy');
});
