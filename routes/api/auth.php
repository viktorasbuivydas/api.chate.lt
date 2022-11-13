<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)
    ->middleware('guest')
    ->group(function () {
        Route::post('login', 'loginUser');
        Route::post('register', 'createUser');
    });
