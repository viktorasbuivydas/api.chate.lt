<?php

namespace App\Repositories\Interfaces;

interface ChatRoomRepositoryInterface
{
    public function getChatRooms();

    public function getChatRoomMessages(int $chatId);
}
