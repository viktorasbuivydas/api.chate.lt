<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OnlineController;

Route::as('online.')
    ->middleware([
        'auth:sanctum',
        'online',
    ])
    ->group(function () {
        Route::get('/online/index', [OnlineController::class, 'index'])
            ->name('index');
    });
