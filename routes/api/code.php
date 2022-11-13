<?php

use App\Http\Controllers\Api\CodeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'permission:approve request',
], function () {
    Route::post('/codes/store', [CodeController::class, 'store'])
        ->name('codes.store');
});
