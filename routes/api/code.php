<?php

use App\Http\Controllers\Api\CodeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        'role:super admin',
        'auth:sanctum',
    ],
], function () {
    Route::post('/codes/store', [CodeController::class, 'store'])
        ->name('codes.store');
});
