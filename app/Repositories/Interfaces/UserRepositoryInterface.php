<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getMessages(string $type);

    public function getMessage(int $messageId);

    public function getUserByField(string $column, string $field);
}
