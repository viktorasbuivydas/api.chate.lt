<?php

namespace App\Services\Interfaces;

interface ChatRoomServiceInterface
{
    public function getChatRooms();

    public function createChatRoom(array $data);
}
