<?php

namespace App\Repositories;

use App\Models\ThreadQuestion;
use App\Repositories\Interfaces\ThreadQuestionRepositoryInterface;

class ThreadQuestionRepository extends BaseRepository implements ThreadQuestionRepositoryInterface
{
    public $model = ThreadQuestion::class;

    public function getQuestions(int $threadId)
    {
        return $this->getModelInstance()
            ->where('thread_id', $threadId)
            ->get();
    }

    public function getQuestion(int $questionId)
    {
        return $this->getModelInstance()
            ->where('id', $questionId)
            ->first();
    }
}
