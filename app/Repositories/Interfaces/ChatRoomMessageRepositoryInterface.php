<?php

namespace App\Repositories\Interfaces;

interface ChatRoomMessageRepositoryInterface
{
    public function getMessages(int $chatId, int $skip, int $take);

    public function getMessagesCount(int $chatId);
}
