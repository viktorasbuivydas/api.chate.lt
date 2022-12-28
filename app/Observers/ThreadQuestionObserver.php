<?php

namespace App\Observers;

use App\Models\ThreadQuestion;
use App\Services\Interfaces\UserServiceInterface;

class ThreadQuestionObserver
{
    public function __construct(
        protected UserServiceInterface $userService
    ) {
    }

    public function created(ThreadQuestion $question)
    {
        $this->userService->updateAntispam($question->user_id);
    }
}
