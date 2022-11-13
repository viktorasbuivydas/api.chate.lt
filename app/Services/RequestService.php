<?php

namespace App\Services;

use App\Repositories\Interfaces\RequestRepositoryInterface;
use App\Services\Interfaces\RequestServiceInterface;

class RequestService extends BaseService implements RequestServiceInterface
{
    protected RequestRepositoryInterface $requestRepository;

    public function __construct(
        RequestRepositoryInterface $requestRepository,
    ) {
        $this->requestRepository = $requestRepository;
    }

    public function sendRequest($data)
    {
        $this->requestRepository
            ->createOrUpdateFromArray($data);
    }
}
