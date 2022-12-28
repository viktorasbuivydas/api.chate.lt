<?php

namespace App\Exceptions;

use Exception;

class ThreadHasNoDataException extends Exception
{
    public function report()
    {
        \Log::debug('Empty thread');
    }

    public function render($request)
    {
        return response()->json(['message' => 'Thread has no data'], 404);
    }
}
