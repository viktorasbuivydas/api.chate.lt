<?php

namespace App\Repositories\Interfaces;

interface InboxRepositoryInterface
{
    public function getMessage(int $messageId, int $userId);

    public function markAsRead(int $messageId);
}
