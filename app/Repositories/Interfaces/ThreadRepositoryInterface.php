<?php

namespace App\Repositories\Interfaces;

interface ThreadRepositoryInterface
{
    public function getThreads(?int $threadId);
}
