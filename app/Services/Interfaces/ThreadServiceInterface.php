<?php

namespace App\Services\Interfaces;

interface ThreadServiceInterface
{
    public function getThreadChildren(?int $parentId);

    public function getThread(?int $threadId);

    public function createThread(array $data);

    public function updateThread(int $threadId, array $data);

    public function deleteThread(int $threadId);
}
