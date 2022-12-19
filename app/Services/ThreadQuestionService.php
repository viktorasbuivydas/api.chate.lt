<?php

namespace App\Services;

use App\Services\Interfaces\ThreadQuestionServiceInterface;
use App\Repositories\Interfaces\ThreadQuestionRepositoryInterface;

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

    public function createQuestion(int $threadId, array $data)
    {
        return $this->threadQuestionRepository->createOrUpdateFromArray(
            array_merge(
                $data,
                [
                    'thread_id' => $threadId,
                    'user_id' => auth()->id(),
                ]
            )
        );
    }
}
