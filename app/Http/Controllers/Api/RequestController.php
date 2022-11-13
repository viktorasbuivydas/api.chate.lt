<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\CreateRequest;
use App\Services\Interfaces\RequestServiceInterface;

class RequestController extends Controller
{
    protected RequestServiceInterface $requestService;

    public function __construct(
        RequestServiceInterface $requestService
    ) {
        $this->requestService = $requestService;
    }

    public function store(CreateRequest $request)
    {
        return $this->requestService
            ->sendRequest(
                [
                    'email' => $request->input('email'),
                    'content' => $request->input('content'),
                ]
            );
    }
}
