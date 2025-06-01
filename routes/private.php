<?php

use App\Versions\Private\Http\Controllers\CommentController;
use App\Versions\Private\Http\Controllers\SerialController;
use App\Versions\Private\Http\Controllers\LogoutController;
use App\Versions\Private\Http\Controllers\ProfileController;
use App\Versions\Private\Http\Controllers\RegisterController;
use App\Versions\Private\Http\Controllers\TeamController;
use App\Versions\Private\Http\Controllers\UserMediaController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:admin'], function () {
    require('admin.php');
});

Route::post('register', RegisterController::class)
    ->middleware('guest')
    ->name('register');
Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])->name('passport.token');
Route::delete('/oauth/logout', LogoutController::class)->name('logout');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth:api', 'role:user']], function () {
    Route::get('', ProfileController::class)->name('profile');
    Route::apiResource('media', UserMediaController::class)
        ->only(['index', 'store', 'destroy']);
    Route::apiResource('teams', TeamController::class)
        ->only(['index', 'show']);
});

Route::apiResource('serials', SerialController::class)
    ->only(['index', 'show']);
Route::apiResource('categories', SerialController::class)
    ->only(['index', 'show']);
Route::apiResource('comments', CommentController::class);
