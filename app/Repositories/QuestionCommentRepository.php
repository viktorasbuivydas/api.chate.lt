<?php

namespace App\Repositories;

use App\Models\QuestionComment;
use App\Repositories\Interfaces\QuestionCommentRepositoryInterface;

class QuestionCommentRepository extends BaseRepository implements QuestionCommentRepositoryInterface
{
    public $model = QuestionComment::class;

    public function getComments(?int $questionId)
    {
        return $this->getModelInstance()
            ->with('user')
            ->where('question_id', $questionId)
            ->latest()
            ->get();
    }
}
