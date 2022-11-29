<?php

namespace App\Services\Interfaces;

interface InboxServiceInterface
{
    public function getMessages(string $type);

    public function getNewMessages();

    public function getMessage(int $messageId);

    public function sendMessage(array $data);
}
