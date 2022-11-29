<?php

namespace App\Exceptions;

use Exception;

class WrongUsernameException extends Exception
{
    public function report()
    {
        \Log::debug('User not found');
    }

    public function render()
    {
        return response()->json(['message' => 'Neleistina vartotojo vardo reiksme'], 404);
    }
}
