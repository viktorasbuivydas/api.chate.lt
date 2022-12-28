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
        Route::get('index', 'getMessages')
            ->name('get-messages');
        Route::get('new', 'getNewMessages')
            ->name('get-new-messages');
        Route::get('{messageId}', 'getMessage')
            ->name('get-message');
        Route::post('store', 'sendMessage')
            ->name('send-message')
            ->middleware('antispam');
    });
