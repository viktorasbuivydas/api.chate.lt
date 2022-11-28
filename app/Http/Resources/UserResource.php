<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'username' => $this->username,
            'roles' => $this->whenLoaded('roles', function () {
                return $this->getRoleNames();
            }),
            'permissions' => $this->whenLoaded('roles', function () {
                return $this->getAllPermissions()->pluck('name');
            }),
        ];
    }
}
