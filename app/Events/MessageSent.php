<?php

namespace App\Events;

use app\DataTransfer\ChatRoomMessageData;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public ChatRoomMessageData $message,
        public User $user
    ) {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('presence.chat.'.$this->message->chatRoomId);
    }

    public function broadCastWith()
    {
        return [
            'message' => $this->message,
            'user' => $this->user->only(['username']),
        ];
    }
}
