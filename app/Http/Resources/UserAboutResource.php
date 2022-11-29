<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAboutResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'username' => $this->username,
            'reputation' => $this->reputation,
            'reputation_points' => $this->reputation_points,
            'money' => $this->money,
            'chat_message_count' => $this->chat_message_count,
            'forum_message_count' => $this->forum_message_count,
            'forum_thread_count' => $this->forum_thread_count,
            'inbox_sent_message_count' => $this->inbox_sent_message_count,
            'roles' => $this->whenLoaded('roles', function () {
                return $this->getRoleNames();
            }),
        ];
    }
}
