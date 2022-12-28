<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatRoomMessageController;

Route::group([
    'middleware' => [
        'auth:sanctum',
    ],
], function () {
    Route::post('/chat/{chat}/upload', [ChatRoomMessageController::class, 'upload']);
    // Route::mediaLibrary('chat');
});
