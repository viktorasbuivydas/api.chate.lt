<?php

namespace App\Repositories;

use App\Models\Thread;
use App\Repositories\Interfaces\ThreadRepositoryInterface;

class ThreadRepository extends BaseRepository implements ThreadRepositoryInterface
{
    public $model = Thread::class;

    public function getThreads(?int $threadId)
    {
        return $this->getModelInstance()
            ->withCount('children')
            ->whereParentId($threadId)
            ->get();
    }
}
