<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\HttpResponses;


class HasOperation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->has('operation')) {
            $response = [
                'error' => 'Calculation error',
                'message' => 'Invalid operation parameters'
            ];

            return response()->json($response, HttpResponses::HTTP_RESPONSE_BAD_REQUEST->value);
        }

        return $next($request);
    }
}
