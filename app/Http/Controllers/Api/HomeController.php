<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inbox\InboxTypeRequest;
use App\Services\Interfaces\InboxServiceInterface;

class HomeController extends Controller
{
    protected InboxServiceInterface $inboxService;

    public function __construct(
        InboxServiceInterface $inboxService
    ) {
        $this->inboxService = $inboxService;
    }

    public function index(InboxTypeRequest $request)
    {
        return $this->inboxService->getMessages($request->input('type'));
    }
}
