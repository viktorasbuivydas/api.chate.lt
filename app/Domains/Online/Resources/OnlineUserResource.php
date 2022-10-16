<?php

namespace App\Domains\Online\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OnlineUserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
        ];
    }
}
