<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RequestResource;
use App\Models\Request as RequestModel;
use App\Http\Requests\Request\GetRequest;
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

    public function index(GetRequest $request)
    {
        $requests = $this->requestService->getRequests(
            $request->input('type')
        );

        if (! $requests) {
            return [];
        }

        return RequestResource::collection($requests);
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

    public function approve(RequestModel $request)
    {
        return $this->requestService
            ->approveRequest($request->email, $request->id);
    }

    public function delete(RequestModel $request)
    {
        return $this->requestService
            ->deleteRequest($request->id);
    }
}
