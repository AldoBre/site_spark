<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ImagenBannerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetPasswordLink']);
Route::post('/password/reset', [ForgotPasswordController::class, 'resetPassword']);

Route::middleware('jwt.auth')->group(function () {

    Route::get('/user', [AuthController::class, 'getUserData']);
    Route::post('/check-token', [AuthController::class, 'checkAuth']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('/imageBanner', ImagenBannerController::class);
});
