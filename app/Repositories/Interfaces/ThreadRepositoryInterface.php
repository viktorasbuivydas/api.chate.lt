<?php

namespace App\Repositories\Interfaces;

interface ThreadRepositoryInterface
{
    public function getThread(?int $threadId);

    public function getThreads(?int $threadId);

    public function getParent(int $threadId);
}
