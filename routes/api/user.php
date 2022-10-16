<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'online']], function () {
    Route::get('/user', [UserController::class, 'user'])->name('user.current');
});
