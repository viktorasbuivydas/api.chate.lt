<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OnlineResource extends JsonResource
{
    public function toArray($request)
    {
        $agent = new \Jenssegers\Agent\Agent;
        $device = $agent->deviceType();
        $platform = $agent->platform();

        return [
            'status' => 'active',
            'platform' => $platform,
            'device' => $device,
            'user' => $this->whenLoaded('user', function () {
                return new OnlineUserResource($this->user);
            }),
        ];
    }
}
