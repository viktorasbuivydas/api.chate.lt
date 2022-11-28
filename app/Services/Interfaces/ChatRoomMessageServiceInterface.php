<?php

namespace App\Services\Interfaces;

interface ChatRoomMessageServiceInterface
{
    public function getChatRoomMessages(int $chatRoomId);

    public function getChatRoomNewMessages(int $chatRoomId, int $lastMessageId);

    public function createChatRoomMessage(array $data);
}
