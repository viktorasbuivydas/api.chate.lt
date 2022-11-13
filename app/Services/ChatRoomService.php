<?php

namespace App\Services;

use App\Repositories\Interfaces\ChatRoomRepositoryInterface;
use App\Services\Interfaces\ChatRoomServiceInterface;

class ChatRoomService extends BaseService implements ChatRoomServiceInterface
{
    protected ChatRoomRepositoryInterface $chatRoomRepository;

    public function __construct(
        ChatRoomRepositoryInterface $chatRoomRepository,
    ) {
        $this->chatRoomRepository = $chatRoomRepository;
    }

    public function getChatRooms()
    {
        return $this->chatRoomRepository->getChatRooms();
    }

    public function createChatRoom(array $data)
    {
        return $this->chatRoomRepository->createOrUpdateFromArray($data);
    }
}
