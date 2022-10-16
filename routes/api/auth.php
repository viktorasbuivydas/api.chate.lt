<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'loginUser']);
Route::post('register', [AuthController::class, 'createUser']);
