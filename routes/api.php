<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([], base_path('routes/api/auth.php'));

Route::group([], base_path('routes/api/request.php'));
Route::group([], base_path('routes/api/chat.php'));
Route::group([], base_path('routes/api/user.php'));
Route::group([], base_path('routes/api/online.php'));
