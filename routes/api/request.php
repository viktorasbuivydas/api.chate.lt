<?php

use App\Http\Controllers\Api\RequestController;
use Illuminate\Support\Facades\Route;

Route::controller(RequestController::class)
    ->as('requests.')
    ->middleware([
        'auth:sanctum',
        'online',
        'antispam',
    ])
    ->group(function () {
        Route::post('/requests/store', 'store')
            ->name('store');

        Route::delete('/requests/{request}/delete', 'delete')
            ->name('delete');
    });
