<?php

use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\ChatMessageController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'online']], function () {

    Route::get('/chat/index', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/store', [ChatController::class, 'store'])->name('chat.store');

    Route::get('/chat/{chat}/index', [ChatMessageController::class, 'index'])->name('chat-messages.index');
    Route::post('/chat/{chat}/store', [ChatMessageController::class, 'store'])->name('chat-messages.store');
});
