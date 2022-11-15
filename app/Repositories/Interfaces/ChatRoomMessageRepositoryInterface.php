<?php

namespace App\Repositories\Interfaces;

interface ChatRoomMessageRepositoryInterface
{
    public function getMessages(int $chatId);
}
