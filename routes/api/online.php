<?php

use App\Http\Controllers\Api\OnlineController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'online']], function () {

    Route::get('/online/index', [OnlineController::class, 'index'])->name('online.index');
});
