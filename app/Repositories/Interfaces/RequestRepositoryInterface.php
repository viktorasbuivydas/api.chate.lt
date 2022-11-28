<?php

namespace App\Repositories\Interfaces;

interface RequestRepositoryInterface
{
    public function getRequests();

    public function getNewRequests();

    public function approve(int $requestId);
}
