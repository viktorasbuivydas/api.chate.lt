<?php

namespace App\Services\Interfaces;

interface ChatRoomMessageServiceInterface
{
    public function getChatRoomMessages(int $chatRoomId, int $skip, int $take);

    public function createChatRoomMessage(array $data);

    public function getChatRoomMessageSkip(int $chatId);
}
