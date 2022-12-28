<?php

namespace App\Services\Interfaces;

interface UserServiceInterface
{
    public function getLoggedInUserData();

    public function getSelectedUsernameUserData(string $username);

    public function updateUserPassword(string $password, string $newPassword);

    public function getMessages(int $userId);

    public function getNewMessages(int $userId);

    public function getSentMessages(int $userId);

    public function updateAntispam(int $userId);
}
