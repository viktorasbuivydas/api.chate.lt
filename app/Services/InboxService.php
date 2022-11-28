<?php

namespace App\Services;

use App\Repositories\Interfaces\InboxRepositoryInterface;
use App\Services\Interfaces\InboxServiceInterface;
use App\Services\Interfaces\UserServiceInterface;

class InboxService extends BaseService implements InboxServiceInterface
{
    protected InboxRepositoryInterface $inboxRepository;

    protected UserServiceInterface $userService;

    public function __construct(
        InboxRepositoryInterface $inboxRepository,
        UserServiceInterface $userService
    ) {
        $this->inboxRepository = $inboxRepository;
        $this->userService = $userService;
    }

    public function getMessages(string $type)
    {
        $user = $this->userService->getLoggedInUserData();

        if ($type === 'sent') {
            $inbox = $this->userService->getSentMessages($user->id)?->sentMessages;
        } else {
            $inbox = $this->userService->getMessages($user->id)?->messages;
        }

        return $inbox;
    }

    public function getMessage(int $messageId)
    {
        return $this->inboxRepository->getMessage($messageId);
    }

    public function sendMessage(array $data)
    {
        return $this->inboxRepository->createOrUpdateFromArray($data);
    }
}
