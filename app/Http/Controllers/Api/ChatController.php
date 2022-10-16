<?php

namespace App\Http\Controllers\Api;

use App\Domains\Chat\Actions\CreateChatAction;
use App\Domains\Chat\DataTransfers\ChatData;
use App\Domains\Chat\Models\Chat;
use App\Domains\Chat\Requests\CreateChatRequest;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        $rooms = Chat::withCount('messages')->get();
        return $rooms;
    }

    public function store(CreateChatRequest $request)
    {
        return app(CreateChatAction::class)
            ->handle(ChatData::fromRequest($request));
    }
}
