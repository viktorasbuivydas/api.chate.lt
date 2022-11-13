<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public $model = User::class;

    public function getMessages(string $type)
    {
        return $this->getModelInstance()
            ->with([
                'user.messages' => fn ($query) => $query->where('type', $type),
            ]);
    }

    public function getUserByField(string $column, string $field)
    {
        return $this->getModelInstance()
            ->where($column, $field)
            ->first();
    }

    public function getMessage(int $messageId)
    {
        // return $this->getModelInstance()
        // ->
    }
}
