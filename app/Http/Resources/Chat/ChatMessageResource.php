<?php

namespace App\Http\Resources\Chat;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'created_at' => $this->created_at->format('H:i:s'),
            'user' => $this->whenLoaded('user', function () {
                return new UserResource($this->whenLoaded('user'));
            }),
        ];
    }
}