<?php

namespace App\Services\Interfaces;

interface ThreadQuestionServiceInterface
{

    public function getQuestions(int $threadId);

    public function getQuestion(int $questionId);
}
