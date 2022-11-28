<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inbox\InboxTypeRequest;
use App\Http\Requests\Inbox\SendMessageRequest;
use App\Http\Resources\InboxResource;
use App\Services\Interfaces\InboxServiceInterface;

class InboxController extends Controller
{
    protected InboxServiceInterface $inboxService;

    public function __construct(
        InboxServiceInterface $inboxService
    ) {
        $this->inboxService = $inboxService;
    }

    public function getMessages(InboxTypeRequest $request)
    {
        $inbox = $this->inboxService->getMessages($request->input('type'));

        if (! $inbox) {
            return [];
        }

        return InboxResource::collection($inbox);
    }

    public function getMessage(int $messageId)
    {
        return $this->inboxService->getMessage($messageId);
    }

    public function sendMessage(SendMessageRequest $request)
    {
        // return $this->inboxService->sendMessage([
        //     'username' => $request->input('username'),
        //     'content' => $request->input('content'),
        // ]);
    }
}
