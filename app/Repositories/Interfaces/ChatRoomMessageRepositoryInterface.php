<?php

namespace App\Repositories\Interfaces;

interface ChatRoomMessageRepositoryInterface
{
    public function getMessages(int $chatId);

    public function getNewMessages(int $chatId, int $lastMessageId);

    public function getMessagesCount(int $chatId);
}
