<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\CreateChatMessageRequest;
use App\Models\ChatRoom;
use App\Services\Interfaces\ChatRoomMessageServiceInterface;

class ChatRoomMessageController extends Controller
{
    protected ChatRoomMessageServiceInterface $chatRoomMessageService;

    public function __construct(
        ChatRoomMessageServiceInterface $chatRoomMessageService
    ) {
        $this->chatRoomMessageService = $chatRoomMessageService;
    }

    public function getChatRoomMessages(ChatRoom $chat)
    {
        $skip = 0;
        if (request()->has('skip')) {
            $skip = request()->input('skip');
        }

        $take = 20;

        return $this->chatRoomMessageService->getChatRoomMessages($chat->id, $skip, $take);
    }

    public function getChatRoomMessageSkip(ChatRoom $chat)
    {
        return $this->chatRoomMessageService->getChatRoomMessageSkip($chat->id);
    }

    public function createChatRoomMessage(CreateChatMessageRequest $request, ChatRoom $chat)
    {
        return $this->chatRoomMessageService->createChatRoomMessage(
            [
                'chat_room_id' => $chat->id,
                'user_id' => auth()->id(),
                'content' => $request->input('content'),
            ]
        );
    }
}
