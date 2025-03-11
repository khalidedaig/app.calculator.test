<?php

namespace App\Http\Controllers;

use App\Services\Calculator;
use App\Models\Operations;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Calculator $calculator
     * @param Operations $operations
     * @return JsonResponse
     */
    public function index(Calculator $calculator, Operations $operations): JsonResponse
    {
        return $calculator->index($operations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Calculator $calculator
     * @return View
     */
    public function create(Calculator $calculator): View
    {
        return $calculator->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Operations $operations
     * @param Calculator $calculator
     * @return JsonResponse
     */
    public function store(Request $request, Operations $operations, Calculator $calculator): JsonResponse
    {
        return $calculator->store($request, $operations);
    }

    /**
     * Delete the specified resource.
     *
     * @param Calculator $calculator
     * @param Operations $operations
     * @return JsonResponse
     */
    public function delete(Calculator $calculator, Operations $operations): JsonResponse
    {
        return $calculator->delete($operations);
    }

    /**
     * Remove all the resources from storage.
     *
     * @param Calculator $calculator
     * @param Operations $operations
     * @return JsonResponse
     */
    public function destroy(Calculator $calculator, Operations $operations): JsonResponse
    {
        return $calculator->destroy($operations);
    }
}
