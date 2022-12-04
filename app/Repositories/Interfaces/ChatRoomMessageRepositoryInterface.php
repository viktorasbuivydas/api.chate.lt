<?php

namespace App\Repositories\Interfaces;

interface ChatRoomMessageRepositoryInterface
{
    public function getMessages(int $chatId);

    public function getMessagesCount(int $chatId);
}
