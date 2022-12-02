<?php

use App\Http\Controllers\Api\ThreadController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        'auth:sanctum',
    ],
], function () {
    Route::get('/topics/{topic}/index', [ThreadController::class, 'index'])
        ->name('topics.index');
    Route::get('/topics/{topic}', [ThreadController::class, 'show'])
        ->name('topics.show');
    Route::post('/topics/{topic}/store', [ThreadController::class, 'store'])
        ->name('topics.store');
    Route::get('/topics/{thread}/update', [ThreadController::class, 'update'])
        ->name('topics.update');
});
