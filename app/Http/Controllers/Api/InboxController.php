<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inbox\InboxTypeRequest;
use App\Http\Requests\Inbox\SendMessageRequest;
use App\Http\Resources\InboxResource;
use App\Services\Interfaces\InboxServiceInterface;
use App\Services\Interfaces\UserServiceInterface;

class InboxController extends Controller
{
    protected InboxServiceInterface $inboxService;

    protected UserServiceInterface $userService;

    public function __construct(
        InboxServiceInterface $inboxService,
        UserServiceInterface $userService
    ) {
        $this->inboxService = $inboxService;
        $this->userService = $userService;
    }

    public function getMessages(InboxTypeRequest $request)
    {
        $user = $this->userService->getLoggedInUserData();

        $inbox = $this->inboxService->getMessages($request->input('type'), $user->id);

        if (! $inbox) {
            return [];
        }

        return InboxResource::collection($inbox);
    }

    public function getMessage(int $messageId)
    {
        $user = $this->userService->getLoggedInUserData();

        $inbox = $this->inboxService->getMessage($messageId, $user->id);

        abort_if(! $inbox, 404);

        return new InboxResource($inbox);
    }

    public function getNewMessages()
    {
        $inbox = $this->inboxService->getNewMessages();

        if (! $inbox) {
            return [];
        }

        return InboxResource::collection($inbox);
    }

    public function sendMessage(SendMessageRequest $request)
    {
        return $this->inboxService->sendMessage([
            'username' => $request->input('username'),
            'content' => $request->input('content'),
        ]);
    }
}
