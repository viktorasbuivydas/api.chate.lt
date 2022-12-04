<?php

use App\Events\MessageSent;
use App\Http\Controllers\Api\ChatRoomController;
use App\Http\Controllers\Api\ChatRoomMessageController;
use Illuminate\Support\Facades\Route;

Route::controller(ChatRoomController::class)
    ->as('chat.')
    ->middleware([
        'auth:sanctum',
        'online',
    ])
    ->group(function () {
        Route::get('/chat/index', 'getChatRooms')
            ->name('get-chat-rooms');

        //super admin
        Route::group([
            'middleware' => 'role:super admin',
        ], function () {
            Route::post('/chat/store', 'createChatRoom')
                ->name('create-chat-room');
        });
    });

Route::controller(ChatRoomMessageController::class)
    ->as('chat-messages.')
    ->middleware([
        'auth:sanctum',
        'online',
    ])
    ->group(function () {
        Route::get('/chat/{chat}/index', 'getChatRoomMessages')
            ->name('get-chat-room-messages');
        Route::get('/chat/{chat}/skip', 'getChatRoomMessageSkip')
            ->name('get-chat-room-messages-count');
        Route::post('/chat/{chat}/store', 'createChatRoomMessage')
            ->name('create-chat-room-message');
    });
