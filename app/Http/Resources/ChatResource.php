<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'messages_count' => $this->messages_count,
            'messages' => $this->whenLoaded('messages', function () {
                return ChatMessageResource::collection(
                    $this->whenLoaded('messages')
                );
            }),
        ];
    }
}
