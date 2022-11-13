<?php

namespace App\Services\Interfaces;

interface CodeServiceInterface
{
    public function sendCode(string $email);
}
