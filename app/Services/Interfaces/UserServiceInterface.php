<?php

namespace App\Services\Interfaces;

interface UserServiceInterface
{
    public function getLoggedInUserData();

    public function getSelectedUsernameUserData(string $username);
}
