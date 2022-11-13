<?php

namespace App\Services;

use App\Repositories\Interfaces\OnlineRepositoryInterface;
use App\Services\Interfaces\OnlineServiceInterface;

class OnlineService extends BaseService implements OnlineServiceInterface
{
    protected OnlineRepositoryInterface $onlineRepository;

    public function __construct(
        OnlineRepositoryInterface $onlineRepository,
    ) {
        $this->onlineRepository = $onlineRepository;
    }

    public function getOnlineUsers()
    {
        return $this->onlineRepository->getOnlineUsers();
    }
}
