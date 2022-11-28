<?php

namespace App\Services\Interfaces;

interface ThreadServiceInterface
{
    public function getThreads(?int $parentId);

    public function createThread(array $data);

    public function updateThread(int $threadId, array $data);

    public function deleteThread(int $threadId);
}
