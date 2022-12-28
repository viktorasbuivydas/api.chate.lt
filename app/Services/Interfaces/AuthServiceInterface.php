<?php

namespace App\Services\Interfaces;

interface AuthServiceInterface
{
    public function login(array $data);

    public function register(array $data);

    public function logout();
}
