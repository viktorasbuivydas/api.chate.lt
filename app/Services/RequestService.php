<?php

namespace App\Services;

use App\Traits\Response;
use App\Services\Interfaces\CodeServiceInterface;
use App\Exceptions\Request\RequestNotFoundException;
use App\Services\Interfaces\RequestServiceInterface;
use App\Repositories\Interfaces\RequestRepositoryInterface;

class RequestService extends BaseService implements RequestServiceInterface
{
    use Response;

    protected RequestRepositoryInterface $requestRepository;

    protected CodeServiceInterface $codeService;

    public function __construct(
        RequestRepositoryInterface $requestRepository,
        CodeServiceInterface $codeService
    ) {
        $this->requestRepository = $requestRepository;
        $this->codeService = $codeService;
    }

    public function getRequests(string $type)
    {
        $type = in_array($type, ['all', 'new']) ? $type : 'all';

        if ($type === 'new') {
            return $this->requestRepository
                ->getNewRequests($type);
        }

        return $this->requestRepository
            ->getRequests();
    }

    public function sendRequest($data)
    {
        return $this->requestRepository
            ->createOrUpdateFromArray($data);
    }

    public function approveRequest(string $email, int $requestId)
    {
        $request = $this->requestRepository->approve($requestId);
        if (! $request) {
            throw new RequestNotFoundException();
        }

        return $this->codeService->sendCode($email);
    }

    public function deleteRequest(int $requestId)
    {
        return $this->requestRepository->deleteByPrimary($requestId);
    }
}
