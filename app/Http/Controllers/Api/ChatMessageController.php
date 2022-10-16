<?php

namespace App\Http\Controllers\Api;

use App\Domains\Chat\Actions\CreateChatMessageAction;
use App\Domains\Chat\DataTransfers\ChatMessageData;
use App\Domains\Chat\Models\Chat;
use App\Domains\Chat\Requests\CreateChatMessageRequest;
use App\Domains\Chat\Resources\ChatResource;
use App\Http\Controllers\Controller;
use App\Queries\Api\ChatMessagesQuery;

class ChatMessageController extends Controller
{
    public function index(Chat $chat)
    {
        $room = (new ChatMessagesQuery($chat->id))
            ->first();

        $room->messages->groupBy('created_at', fn ($item) => $item->created_at->format('M d'));

        return new ChatResource(
            $room
        );
    }

    public function store(CreateChatMessageRequest $request, Chat $chat)
    {
        return app(CreateChatMessageAction::class)
            ->handle(ChatMessageData::fromRequest($request, $chat));
    }
}
