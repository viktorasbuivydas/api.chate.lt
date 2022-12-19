<?php

namespace App\Exceptions;

use Exception;

class MustWaitSecondsException extends Exception
{
    public function __construct(private int $seconds)
    {
    }

    public function render($request)
    {
        return response()->json([
            'message' => 'Antispam apsauga, prašome bandyti dar kartą po '.$this->seconds.' sekundžių',
        ], 400);
    }
}
