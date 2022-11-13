<?php

namespace App\Services;

use App\Repositories\Interfaces\InboxRepositoryInterface;
use App\Services\Interfaces\InboxServiceInterface;

class InboxService extends BaseService implements InboxServiceInterface
{
    protected InboxRepositoryInterface $inboxRepository;

    public function __construct(
        InboxRepositoryInterface $inboxRepository,
    ) {
        $this->inboxRepository = $inboxRepository;
    }

    public function getMessages(string $type)
    {
        return $this->inboxRepository->getMessages($type);
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
