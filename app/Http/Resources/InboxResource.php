<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InboxResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'read_at' => $this->read_at,
            'sender' => $this->whenLoaded('sender', function () {
                return new UserResource($this->sender);
            }),
            'receiver' => $this->whenLoaded('receiver', function () {
                return new UserResource($this->receiver);
            }),
        ];
    }
}
