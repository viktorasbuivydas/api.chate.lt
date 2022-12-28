<?php

namespace App\Services;

use App\Services\Interfaces\ThreadServiceInterface;
use App\Repositories\Interfaces\ThreadRepositoryInterface;

class ThreadService extends BaseService implements ThreadServiceInterface
{
    protected ThreadRepositoryInterface $threadRepository;

    public function __construct(
        ThreadRepositoryInterface $threadRepository,
    ) {
        $this->threadRepository = $threadRepository;
    }

    public function getThreadChildren(?int $parentId)
    {
        if ($parentId) {
            $threads = $this->threadRepository
                ->getThread($parentId);
        } else {
            $threads = $this->threadRepository
                ->getThreads($parentId);
        }

        return $threads;
    }

    public function getThread(?int $threadId)
    {
        $thread = $this->threadRepository
            ->getParent($threadId);

        return $thread;
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
