<?php

namespace App\Repositories;

use App\Models\ChatRoomMessage;
use App\Repositories\Interfaces\ChatRoomMessageRepositoryInterface;

class ChatRoomMessageRepository extends BaseRepository implements ChatRoomMessageRepositoryInterface
{
    public $model = ChatRoomMessage::class;
}
