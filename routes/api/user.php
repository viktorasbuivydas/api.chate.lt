<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)
    ->as('user.')
    ->middleware([
        'auth:sanctum',
        'online',
    ])
    ->group(function () {
        Route::get('user', 'user')
            ->name('current');

        Route::get('about/{username}', 'getSelectedUsernameUserData')
            ->name('about');

        Route::group(['prefix' => 'user'], function () {
            Route::patch('password', 'changePassword')
                ->name('password');
        });
    });
