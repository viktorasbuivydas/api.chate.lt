<?php

namespace App\Services\Interfaces;

interface ChatRoomMessageServiceInterface
{
    public function getChatRoomMessages(int $chatRoomId);

    public function createChatRoomMessage(array $data);
}
