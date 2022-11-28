<?php

namespace App\Exceptions;

use Exception;

class RequestNotFoundException extends Exception
{
    public function report()
    {
        \Log::debug('Request not found');
    }

    public function render($request)
    {
        return response()->json(['message' => 'Request Not Found'], 404);
    }
}
