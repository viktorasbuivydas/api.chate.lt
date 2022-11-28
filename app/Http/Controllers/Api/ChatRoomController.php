<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\CreateChatRoomRequest;
use App\Http\Resources\ChatResource;
use App\Services\Interfaces\ChatRoomServiceInterface;

class ChatRoomController extends Controller
{
    protected ChatRoomServiceInterface $chatRoomService;

    public function __construct(
        ChatRoomServiceInterface $chatRoomService
    ) {
        $this->chatRoomService = $chatRoomService;
    }

    public function getChatRooms()
    {
        return ChatResource::collection(
            $this->chatRoomService->getChatRooms()
        );
    }

    public function createChatRoom(CreateChatRoomRequest $request)
    {
        return $this->chatRoomService->createChatRoom([
            'name' => $request->input('name'),
            'is_public' => $request->input('is_public'),
        ]);
    }
}
