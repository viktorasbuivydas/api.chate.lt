<?php

use App\Http\Controllers\Api\ChatRoomMessageController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        'auth:sanctum',
    ],
], function () {
    Route::post('/chat/{chat}/upload', [ChatRoomMessageController::class, 'upload']);
    // Route::mediaLibrary('chat');
});
