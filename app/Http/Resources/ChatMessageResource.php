<?php

namespace App\Http\Resources;

use App\Models\ChatRoomMessage;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'username' => $this->user->username
        ];
    }
}
