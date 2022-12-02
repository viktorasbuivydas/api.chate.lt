<?php

use App\Http\Controllers\Api\ThreadController;
use App\Http\Controllers\Api\ThreadQuestionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        'auth:sanctum',
    ],
], function () {
    Route::get('/threads/index', [ThreadController::class, 'index'])
        ->name('threads.index');
    Route::get('/threads/{thread}', [ThreadController::class, 'show'])
        ->name('threads.show');
    Route::post('/threads/store', [ThreadController::class, 'store'])
        ->name('threads.store');
    Route::get('/threads/{thread}/update', [ThreadController::class, 'update'])
        ->name('threads.update');
    Route::delete('/threads/{thread}/delete', [ThreadController::class, 'delete'])
        ->name('threads.delete');

    Route::get('/questions/thread/{thread}', [ThreadQuestionController::class, 'getQuestions'])
        ->name('questions.index');

    Route::get('/questions/{question}', [ThreadQuestionController::class, 'getQuestion'])
        ->name('questions.show');
});
