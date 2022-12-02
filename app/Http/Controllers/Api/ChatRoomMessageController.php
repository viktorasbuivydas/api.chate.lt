<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\CreateChatMessageRequest;
use App\Models\ChatRoom;
use App\Services\Interfaces\ChatRoomMessageServiceInterface;
use Illuminate\Http\Request as HttpRequest;
use Storage;

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
        return $this->chatRoomMessageService->getChatRoomMessages($chat->id);
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

    public function upload(HttpRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        // Public Folder
        // $request->image->move(public_path('images'), $imageName);

        // // Store in S3
        $request->image->storeAs('images/chat', $imageName, 's3');

        return response()->json([
            'image' => $imageName,
        ]);

        // return Storage::disk('s3')->response('images/chat/'.$imageName);
    }
}
