<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RequestController;

Route::controller(RequestController::class)
    ->as('requests.')
    ->middleware([
        'auth:sanctum',
        'online',
    ])
    ->group(function () {
        Route::get('/requests/index', 'index')
            ->name('index');

        Route::post('/requests/store', 'store')
            ->name('store');

        Route::post('/requests/{request}/approve', 'approve')
            ->name('approve');

        Route::delete('/requests/{request}/delete', 'delete')
            ->name('delete');
    });
