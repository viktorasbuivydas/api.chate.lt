<?php

namespace App\Repositories;

use App\Models\ChatRoom;
use App\Repositories\Interfaces\ChatRoomRepositoryInterface;

class ChatRoomRepository extends BaseRepository implements ChatRoomRepositoryInterface
{
    public $model = ChatRoom::class;

    public function getChatRooms()
    {
        return $this->getModelInstance()
            ->withCount([
                'messages',
            ])
            ->get();
    }
}
