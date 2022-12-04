<?php

namespace App\Services;

use App\DataTransfer\ChatRoomMessageData;
use App\Events\MessageSent;
use App\Http\Resources\ChatMessageResource;
use App\Models\ChatRoomMessage;
use App\Repositories\Interfaces\ChatRoomMessageRepositoryInterface;
use App\Repositories\Interfaces\ChatRoomRepositoryInterface;
use App\Services\Interfaces\ChatRoomMessageServiceInterface;
use Illuminate\Support\Arr;

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
        $roomMessages = $this->chatRoomMessageRepository->getMessages($chatId);

        return ChatRoomMessageData::collection($roomMessages);
    }

    public function createChatRoomMessage(array $data)
    {
        $message = $this->chatRoomMessageRepository
            ->createOrUpdateFromArray($data);

        abort_if(!$message, 400);

        $message->load('user');

        event(new MessageSent(
            ChatRoomMessageData::fromModel($message)
        ));

        return ChatRoomMessageData::fromModel($message);
    }
}
