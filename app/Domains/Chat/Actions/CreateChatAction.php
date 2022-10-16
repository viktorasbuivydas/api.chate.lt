<?php

namespace App\Domains\Chat\Actions;

use App\Domains\Chat\DataTransfers\ChatData;
use App\Domains\Chat\Models\Chat;

class CreateChatAction
{
    public function handle(ChatData $input)
    {
        Chat::create($input->toArray());
    }
}
