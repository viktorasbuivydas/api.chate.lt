<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessagesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => ChatMessageResource::collection($this->resource),
        ];
    }
}
