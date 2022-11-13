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

    public function getChatRoomMessages(int $chatId)
    {
        return $this->getModelInstance()
            ->with([
                'messages' => fn ($q) => $q->latest()
                    ->paginate(30),
                'messages.user',
            ])
            ->whereId($chatId)
            ->first();
    }
}
