<?php

namespace App\Repositories\Interfaces;

interface ThreadQuestionRepositoryInterface
{
    public function getQuestions(int $threadId);

    public function getQuestion(int $questionId);
}
