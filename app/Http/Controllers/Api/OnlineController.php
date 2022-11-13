<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Online\OnlineResource;
use App\Services\Interfaces\OnlineServiceInterface;

class OnlineController extends Controller
{
    protected OnlineServiceInterface $onlineService;

    public function __construct(
        OnlineServiceInterface $onlineService
    ) {
        $this->onlineService = $onlineService;
    }

    public function index()
    {
        return OnlineResource::collection(
            $this->onlineService->getOnlineUsers()
        );
    }
}
