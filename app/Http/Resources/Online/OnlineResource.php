<?php

namespace App\Http\Resources\Online;

use Illuminate\Http\Resources\Json\JsonResource;

class OnlineResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'updated_at' => $this->updated_at->diffForHumans(),
            'device' => $this->is_mobile,
            'user' => $this->whenLoaded('user', function () {
                return new OnlineUserResource($this->user);
            }),
        ];
    }
}
