<?php

namespace App\Traits;

trait Response
{
    public function response(string $message, int $statusCode)
    {
        return response()
            ->json([
                'message' => $message,
            ], $statusCode);
    }

    public function success(string $message)
    {
        return response()
            ->json([
                'message' => $message,
            ], 200);
    }
}
