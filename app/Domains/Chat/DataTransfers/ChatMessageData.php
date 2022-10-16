<?php

namespace App\Domains\Chat\DataTransfers;

use App\Domains\Chat\Models\Chat;
use App\Domains\Chat\Requests\CreateChatMessageRequest;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\ConditionallyLoadsAttributes;

class ChatMessageData implements Arrayable
{
    use ConditionallyLoadsAttributes;

    public function __construct(
        public string $content,
        public int $userId,
        public Chat $chat,
    ) {
    }

    public static function fromRequest(CreateChatMessageRequest $request, Chat $chat): ChatMessageData
    {
        return new static(
            content: $request->input('content'),
            userId: auth()->user()->id,
            chat: $chat
        );
    }

    public function toArray()
    {
        return $this->filter([
            'content' => $this->content,
            'user_id' => $this->userId,
            'chat_id' => $this->chat->id,
        ]);
    }
}
