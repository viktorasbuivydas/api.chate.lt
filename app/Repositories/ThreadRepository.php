<?php

namespace App\Repositories;

use App\Models\Thread;
use App\Repositories\Interfaces\ThreadRepositoryInterface;

class ThreadRepository extends BaseRepository implements ThreadRepositoryInterface
{
    public $model = Thread::class;

    public function getThread(?int $threadId)
    {
        return $this->getModelInstance()
            ->withCount('children')
            ->withWhereHas('children', fn ($q) => $q
                ->withCount('questions')
                ->where('parent_id', $threadId))
            ->first();
    }

    public function getThreads(?int $threadId)
    {
        return $this->getModelInstance()
            ->withCount('children')
            ->withCount('questions')
            ->where('parent_id', $threadId)
            ->get();
    }

    public function getParent(int $threadId)
    {
        return $this->getModelInstance()
            ->with('parent')
            ->where('id', $threadId)
            ->first();
    }
}
