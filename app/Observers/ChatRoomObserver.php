<?php

namespace App\Observers;

use App\Models\ChatRoom;

class ChatRoomObserver
{
    public function creating(ChatRoom $chat): void
    {
    }
}
