<?php

use App\Http\Controllers\Api\InboxController;
use Illuminate\Support\Facades\Route;

Route::controller(InboxController::class)
    ->as('inbox.')
    ->prefix('inbox')
    ->middleware([
        'auth:sanctum',
        'online',
    ])
    ->group(function () {
        Route::get('index/{type}', 'getMessages')
            ->name('get-messages');
        Route::get('{messageId}', 'showMessage')
            ->name('get-message');
        Route::post('store', 'sendMessage')
            ->name('send-message');
    });
