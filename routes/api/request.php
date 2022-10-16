<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RequestController;

Route::post('/requests/store', [RequestController::class, 'store'])->name('requests.store');
