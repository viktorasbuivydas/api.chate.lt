<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    public function report()
    {
        \Log::debug('User not found');
    }

    public function render($request)
    {
        return response()->json(['message' => 'User Not Found'], 404);
    }
}
