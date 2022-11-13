<?php

use App\Http\Controllers\Api\OnlineController;
use Illuminate\Support\Facades\Route;

Route::as('online.')
    ->middleware([
        'auth:sanctum',
        'online',
    ])
    ->group(function () {
        Route::get('/online/index', [OnlineController::class, 'index'])
            ->name('index');
    });
