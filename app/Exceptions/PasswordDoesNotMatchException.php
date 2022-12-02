<?php

namespace App\Exceptions;

use Exception;

class PasswordDoesNotMatchException extends Exception
{
    public function report()
    {
        \Log::debug('Pasword does not match');
    }

    public function render($request)
    {
        return response()->json(['message' => 'Įvestas slaptažodis yra neteisingas'], 401);
    }
}
