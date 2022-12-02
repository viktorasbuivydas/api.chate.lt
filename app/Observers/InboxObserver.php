<?php

namespace App\Observers;

use App\Models\Inbox;
use App\Repositories\Interfaces\UserRepositoryInterface;

class InboxObserver
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function created(Inbox $inbox): void
    {
        $this->userRepository
            ->incrementValue(
                'inbox_sent_message_count',
                1,
                $inbox->sender_id
            );
    }
}
