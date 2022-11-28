<?php

namespace App\Services;

use App\Repositories\Interfaces\ThreadRepositoryInterface;
use App\Services\Interfaces\ThreadServiceInterface;

class ThreadService extends BaseService implements ThreadServiceInterface
{
    protected ThreadRepositoryInterface $threadRepository;

    public function __construct(
        ThreadRepositoryInterface $threadRepository,
    ) {
        $this->threadRepository = $threadRepository;
    }

    public function getThreads(?int $parentId)
    {
        $threads = $this->threadRepository
            ->getThreads($parentId);

        return $threads;
    }

    public function createThread(array $data)
    {
        return $this->threadRepository
            ->createOrUpdateFromArray($data);
    }

    public function updateThread(int $threadId, array $data)
    {
        return $this->threadRepository
            ->updateByPrimary($threadId, $data);
    }

    public function deleteThread(int $threadId)
    {
        return $this->threadRepository
            ->deleteByPrimary($threadId);
    }
}
