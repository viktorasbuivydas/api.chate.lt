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
            'sender' => $this->sender?->username,
            'receiver' => $this->receiver?->username,
            'created_at' => $this->created_at?->diffForHumans(),
        ];
    }
}
