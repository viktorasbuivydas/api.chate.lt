<?php

namespace App\Http\Resources\Online;

use Illuminate\Http\Resources\Json\JsonResource;

class OnlineUserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'username' => $this->username,
        ];
    }
}
