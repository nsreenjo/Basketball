<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponses {
    protected function ok($message, $data = []): JsonResponse
    {
        return $this->success($message, $data, 200);
    }

    protected function success($message, $data = [], $statusCode = 200):JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }

    protected function error($errors = [], $statusCode = 400): JsonResponse
    {
        if (is_string($errors)) {
            return response()->json([
                'message' => $errors,
                'status' => $statusCode
            ], $statusCode);
        }

        return response()->json([
            'errors' => $errors,
            'status' => $statusCode
        ], $statusCode);
    }

    protected function notAuthorized($message): JsonResponse
    {
        return $this->error(['message' => $message, 'status' => 401], 401);
    }
}
