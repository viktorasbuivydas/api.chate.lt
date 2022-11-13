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

    public function getChatRoomMessages(int $chatId)
    {
        $room = $this->chatRoomRepository->getChatRoomMessages($chatId);

        $messages = $room->messages->groupBy(
            fn ($item) => $item->created_at->format('Y-m-d')
        )->reverse();

        return $messages->map(
            fn ($item) => ChatMessageResource::collection($item->reverse())
        );
    }

    public function createChatRoomMessage(array $data)
    {
        return $this->chatRoomMessageRepository
            ->createOrUpdateFromArray($data);
    }
}
