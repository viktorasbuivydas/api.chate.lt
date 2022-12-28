<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::controller(AuthController::class)
    ->middleware('guest')
    ->group(function () {
        Route::post('login', 'loginUser');
        Route::post('register', 'createUser');
        Route::post('logout', 'logout')
            ->name('logout');
    });
