<?php

namespace App\Services;

use App\Repositories\Interfaces\ThreadQuestionRepositoryInterface;
use App\Services\Interfaces\ThreadQuestionServiceInterface;

class ThreadQuestionService extends BaseService implements ThreadQuestionServiceInterface
{
    protected ThreadQuestionRepositoryInterface $threadQuestionRepository;

    public function __construct(
        ThreadQuestionRepositoryInterface $threadQuestionRepository,
    ) {
        $this->threadQuestionRepository = $threadQuestionRepository;
    }

    public function getQuestions(int $threadId)
    {
        return $this->threadQuestionRepository->getQuestions($threadId);
    }

    public function getQuestion(int $questionId)
    {
        return $this->threadQuestionRepository->getQuestion($questionId);
    }
}
