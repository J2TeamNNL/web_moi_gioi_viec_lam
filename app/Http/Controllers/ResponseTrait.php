<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    public function successResponse($data = [], $message = ''): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => $data,
            'message' => $message
        ]);
    }

    public function errorResponse($message = '', $status = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data'    => [],
            'message' => $message
        ], $status);
    }
}