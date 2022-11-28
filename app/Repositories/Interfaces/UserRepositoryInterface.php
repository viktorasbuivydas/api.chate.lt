<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getMessages(int $userId);

    public function getSentMessages(int $userId);

    public function getUserData(int $userId);

    public function getUserByField(string $column, string $field);

    public function checkUserPassword(string $hashedPassword, int $userId);

    public function incrementValue(string $column, int $value, int $userId);
}
