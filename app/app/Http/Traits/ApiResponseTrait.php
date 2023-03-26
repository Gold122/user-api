<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    /**
     * Return response in json format with 200 status code.
     *
     * @param mixed $data
     * @return JsonResponse
     */
    public function success(mixed $data = []): JsonResponse
    {
        return response()->json(['data' => $data]);
    }

    /**
     * Return translated message in response.
     *
     * @param string $message
     * @param int $statusCode
     *
     * @return JsonResponse
     */
    public function msg(string $message, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'messages' => [__($message)]
        ], $statusCode);
    }
}
