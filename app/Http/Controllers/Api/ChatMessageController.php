<?php

namespace App\Http\Controllers\Api;

use App\Domains\Chat\Actions\CreateChatMessageAction;
use App\Domains\Chat\DataTransfers\ChatMessageData;
use App\Domains\Chat\Models\Chat;
use App\Domains\Chat\Requests\CreateChatMessageRequest;
use App\Domains\Chat\Resources\ChatMessageResource;
use App\Domains\Chat\Resources\ChatMessagesResource;
use App\Domains\Chat\Resources\ChatResource;
use App\Http\Controllers\Controller;
use App\Queries\Api\ChatMessagesQuery;

class ChatMessageController extends Controller
{
    public function index(Chat $chat)
    {
        $room = (new ChatMessagesQuery($chat->id))
            ->first();

        $messages = $room->messages->groupBy(
            fn ($item) => $item->created_at->format('Y-m-d')
        )->reverse();

        return $messages->map(
            fn ($item) => ChatMessageResource::collection($item->reverse())
        );
    }

    public function store(CreateChatMessageRequest $request, Chat $chat)
    {
        return app(CreateChatMessageAction::class)
            ->handle(ChatMessageData::fromRequest($request, $chat));
    }
}
