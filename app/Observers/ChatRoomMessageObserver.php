<?php

namespace App\Observers;

use App\Models\ChatRoomMessage;
use App\Repositories\Interfaces\UserRepositoryInterface;

class ChatRoomMessageObserver
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function created(ChatRoomMessage $message): void
    {
        $this->userRepository
            ->incrementValue(
                'reputation_points', config('settings.reputation_points.chat_message'),
                $message->user_id);
    }
}
