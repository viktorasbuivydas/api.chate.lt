<?php

namespace App\Repositories\Interfaces;

interface QuestionCommentRepositoryInterface
{
    public function getComments(int $questionId);
}
