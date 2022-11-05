<?php

namespace App\Domains\Online\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OnlineResource extends JsonResource
{
    public function toArray($request)
    {
        // $agent = new Agent;

        return [
            // diffForHumans
            'updated_at' => $this->updated_at->diffForHumans(),
            // 'device' => $agent->isMobile ? 'phone' : 'computer',
            'user' => $this->whenLoaded('user', function () {
                return new OnlineUserResource($this->user);
            }),
        ];
    }
}
