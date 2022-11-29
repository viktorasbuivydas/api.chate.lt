<?php

namespace App\Repositories;

use App\Models\Inbox;
use App\Repositories\Interfaces\InboxRepositoryInterface;
use Carbon\Carbon;

class InboxRepository extends BaseRepository implements InboxRepositoryInterface
{
    public $model = Inbox::class;

    public function getMessage(int $messageId, int $userId)
    {
        return $this->getModelInstance()
            ->with(['sender', 'receiver'])
            ->where('id', $messageId)
            ->where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->first();
    }

    public function markAsRead(int $messageId)
    {
        return $this->getModelInstance()
            ->whereId($messageId)
            ->whereNull('read_at')
            ->update(['read_at' => Carbon::now()]);
    }
}
