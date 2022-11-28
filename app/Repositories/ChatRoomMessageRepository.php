<?php

namespace App\Repositories;

use App\Models\ChatRoomMessage;
use App\Repositories\Interfaces\ChatRoomMessageRepositoryInterface;

class ChatRoomMessageRepository extends BaseRepository implements ChatRoomMessageRepositoryInterface
{
    public $model = ChatRoomMessage::class;

    public function getMessages(int $chatId)
    {
        return $this->getModelInstance()
            ->with([
                'user',
            ])
            ->where('chat_room_id', $chatId)
            ->latest()
            ->paginate();
    }

    public function getNewMessages(int $chatId, int $lastMessageId)
    {
        return $this->getModelInstance()
            ->with([
                'user',
            ])
            ->where('chat_room_id', $chatId)
            ->where('id', '>', $lastMessageId)
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
    }

    public function getMessagesCount(int $chatId)
    {
        return $this->getModelInstance()
            ->select('id', 'chat_room_id')
            ->where('chat_room_id', $chatId)
            ->count();
    }
}
