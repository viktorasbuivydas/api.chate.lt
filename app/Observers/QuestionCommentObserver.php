<?php

namespace App\Observers;

use App\Models\QuestionComment;
use App\Services\Interfaces\UserServiceInterface;

class QuestionCommentObserver
{
    public function __construct(
        protected UserServiceInterface $userService
    ) {
    }

    public function created(QuestionComment $comment)
    {
        $this->userService->updateAntispam($comment->user_id);
    }
}
