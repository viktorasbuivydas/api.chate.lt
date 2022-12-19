<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CodeController;

Route::group([
    'middleware' => [
        'role:super admin',
        'auth:sanctum',
    ],
], function () {
    Route::post('/codes/store', [CodeController::class, 'store'])
        ->name('codes.store');
});
