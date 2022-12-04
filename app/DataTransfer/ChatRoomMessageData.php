<?php

namespace App\DataTransfer;

use App\Models\ChatRoomMessage;
use Spatie\LaravelData\Data;

class ChatRoomMessageData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $content,
        public readonly string $created_at,
        public readonly int $chatRoomId,
        public readonly string $username,
    ) {
    }

    public static function fromModel(ChatRoomMessage $message): self
    {
        return new self(
            $message->id,
            $message->content,
            $message->created_at,
            $message->chat_room_id,
            $message->user->username
        );
    }
}
