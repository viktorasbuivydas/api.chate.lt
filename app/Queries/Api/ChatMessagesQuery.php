<?php

namespace App\Queries\Api;

use App\Domains\Chat\Models\Chat;
use Spatie\QueryBuilder\QueryBuilder;

class ChatMessagesQuery extends QueryBuilder
{
    public function __construct($chatId)
    {
        parent::__construct(
            Chat::query()
                ->with([
                    'messages' => fn ($q) => $q->latest()->paginate(),
                    'messages.user'
                ])
                ->whereId($chatId)
        );
    }
}
