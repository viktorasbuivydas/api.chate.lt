<?php

namespace App\Services;

use App\Http\Resources\Chat\ChatMessageResource;
use App\Repositories\Interfaces\ChatRoomMessageRepositoryInterface;
use App\Repositories\Interfaces\ChatRoomRepositoryInterface;
use App\Services\Interfaces\ChatRoomMessageServiceInterface;

class ChatRoomMessageService extends BaseService implements ChatRoomMessageServiceInterface
{
    protected ChatRoomMessageRepositoryInterface $chatRoomMessageRepository;

    protected ChatRoomRepositoryInterface $chatRoomRepository;

    public function __construct(
        ChatRoomRepositoryInterface $chatRoomRepository,
        ChatRoomMessageRepositoryInterface $chatRoomMessageRepository,
    ) {
        $this->chatRoomMessageRepository = $chatRoomMessageRepository;
        $this->chatRoomRepository = $chatRoomRepository;
    }

    public function getChatRoomMessages(int $chatId, int $skip, int $take)
    {
        $totalMessageCount = $this->chatRoomMessageRepository->getMessagesCount($chatId);

        if ($skip === 0) {
            $take = $totalMessageCount % 20;
        }

        $roomMessages = $this->chatRoomMessageRepository->getMessages($chatId, $skip, $take);

        return ChatMessageResource::collection($roomMessages);
    }

    public function getChatRoomMessageSkip($chatId)
    {
        $messageCount = $this->chatRoomMessageRepository->getMessagesCount($chatId);
        $skip = $messageCount - 20;

        return $skip > 0 ? $skip : $messageCount;
    }

    public function createChatRoomMessage(array $data)
    {
        return $this->chatRoomMessageRepository
            ->createOrUpdateFromArray($data);
    }
}
