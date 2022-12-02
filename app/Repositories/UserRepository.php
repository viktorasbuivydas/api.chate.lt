<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public $model = User::class;

    public function getMessages(int $userId)
    {
        return $this->getModelInstance()
            ->whereId($userId)
            ->with('messages.receiver')
            ->withWhereHas('messages', fn ($query) => $query->orderBy('id', 'desc'))
            ->first();
    }

    public function getNewMessages(int $userId)
    {
        return $this->getModelInstance()
            ->whereId($userId)
            ->with('messages.receiver')
            ->withWhereHas('messages', fn ($query) => $query->unread())
            ->first();
    }

    public function getSentMessages(int $userId)
    {
        return $this->getModelInstance()
            ->whereId($userId)
            ->with('sentMessages.sender')
            ->withWhereHas('sentMessages', fn ($query) => $query->orderBy('id', 'desc'))
            ->first();
    }

    public function getUserData(int $userId)
    {
        return $this->getModelInstance()
            ->with([
                'roles',
                'permissions',
            ])
            ->whereId($userId)
            ->first();
    }

    public function getUserByField(string $column, string $field)
    {
        return $this->getModelInstance()
            ->where($column, $field)
            ->first();
    }

    public function checkUserPassword(string $hashedPassword, int $userId)
    {
        return $this->getModelInstance()
            ->whereId($userId)
            ->where('password', $hashedPassword)
            ->first();
    }

    public function incrementValue(string $column, int $value, int $userId)
    {
        return $this->getModelInstance()
            ->whereId($userId)
            ->increment($column, $value);
    }
}
