<?php

namespace App\Domains\Chat\Actions;

use App\Domains\Chat\DataTransfers\ChatMessageData;
use App\Domains\Chat\Models\ChatMessage;

class CreateChatMessageAction
{
    public function handle(ChatMessageData $input)
    {
        ChatMessage::create($input->toArray());
    }
}
