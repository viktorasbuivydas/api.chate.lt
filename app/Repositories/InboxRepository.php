<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Inbox;
use App\Repositories\Interfaces\InboxRepositoryInterface;

class InboxRepository extends BaseRepository implements InboxRepositoryInterface
{
    public $model = Inbox::class;

    public function getMessage(int $messageId, int $userId)
    {
        return $this->getModelInstance()
            ->with(['sender', 'receiver'])
            ->where('id', $messageId)
            ->first();
    }

    public function markAsRead(int $messageId)
    {
        return $this->getModelInstance()
            ->where('id', $messageId)
            ->whereNull('read_at')
            ->update(['read_at' => Carbon::now()]);
    }
}
