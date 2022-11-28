<?php

namespace App\Services;

use App\Http\Resources\ChatMessageResource;
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

    public function getChatRoomMessages(int $chatId)
    {
        if (request()->has('last_message_id')) {
            return $this->getChatRoomNewMessages($chatId, request()->input('last_message_id'));
        }

        $roomMessages = $this->chatRoomMessageRepository->getMessages($chatId);

        return ChatMessageResource::collection($roomMessages);
    }

    public function getChatRoomNewMessages(int $chatId, int $lastMessageId)
    {
        $roomMessages = $this->chatRoomMessageRepository->getNewMessages($chatId, $lastMessageId);

        return ChatMessageResource::collection($roomMessages);
    }

    public function createChatRoomMessage(array $data)
    {
        return $this->chatRoomMessageRepository
            ->createOrUpdateFromArray($data);
    }
}
