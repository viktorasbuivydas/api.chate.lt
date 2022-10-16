<?php

namespace App\Domains\Authorization\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
        ];
    }
}
