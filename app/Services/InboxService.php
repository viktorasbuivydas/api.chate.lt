<?php

namespace App\Services;

use App\Exceptions\WrongUsernameException;
use App\Repositories\Interfaces\InboxRepositoryInterface;
use App\Services\Interfaces\InboxServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Arr;

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

    public function getNewMessages()
    {
        $user = $this->userService->getLoggedInUserData();

        $inbox = $this->userService->getNewMessages($user->id)?->messages;

        return $inbox;
    }

    public function getMessage(int $messageId, int $userId)
    {
        $message = $this->inboxRepository->getMessage($messageId, $userId);

        abort_if(! $message, 404);

        if ($userId === $message->receiver_id && $message->read_at === null) {
            $this->inboxRepository->markAsRead($messageId);
        }

        $message = $this->inboxRepository->getMessage($messageId, $userId);

        return $message;
    }

    public function sendMessage(array $data)
    {
        $user = $this->userService->getSelectedUsernameUserData(Arr::get($data, 'username'));
        $loggedInUser = $this->userService->getLoggedInUserData();

        if ($user->username === $loggedInUser->username) {
            throw new WrongUsernameException();
        }

        $dataArray = Arr::has($data, ['sender_id', 'receiver_id']) ? $data : array_merge($data, [
            'sender_id' => $loggedInUser->id,
            'receiver_id' => $user->id,
        ]);

        return $this->inboxRepository->createOrUpdateFromArray($dataArray);
    }
}
