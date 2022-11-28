<?php

namespace App\Services\Interfaces;

interface RequestServiceInterface
{
    public function getRequests(string $type);

    public function sendRequest(array $data);

    public function approveRequest(string $email, int $requestId);

    public function deleteRequest(int $requestId);
}
