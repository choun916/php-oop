<?php

use App\Http\Controllers\Auth\MemberController;
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


Route::middleware('auth:api')->prefix('/auth/member')->group(function ($router) {
    Route::post('join', [MemberController::class, 'join'])->withoutMiddleware('auth:api');
    Route::post('login', [MemberController::class, 'login'])->withoutMiddleware('auth:api');
    Route::get('logout', [MemberController::class, 'logout']);
    Route::post('refresh', [MemberController::class, 'refresh']);
    Route::get('profile', [MemberController::class, 'profile']);
});
