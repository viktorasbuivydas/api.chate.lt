<?php

use App\Http\Controllers\Api\RequestController;
use Illuminate\Support\Facades\Route;

Route::post('/requests/store', [RequestController::class, 'store'])
    ->name('requests.store');
