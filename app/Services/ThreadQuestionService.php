<?php

namespace App\Services;

use App\Repositories\Interfaces\ThreadQuestionRepositoryInterface;
use App\Services\Interfaces\ThreadQuestionServiceInterface;

class ThreadQuestionService extends BaseService implements ThreadQuestionServiceInterface
{
    protected ThreadQuestionRepositoryInterface $threadQuestionRepository;

    public function __construct(
        ThreadQuestionRepositoryInterface $threadRepository,
    ) {
        $this->threadRepository = $threadRepository;
    }
}
