<?php

use App\Versions\Private\Http\Controllers\LogoutController;
use App\Versions\Private\Http\Controllers\ProfileController;
use App\Versions\Private\Http\Controllers\RegisterController;
use App\Versions\Private\Http\Controllers\UserMediaController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;

Route::post('register', RegisterController::class)
    ->middleware('guest')
    ->name('register');
Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])->name('passport.token');
Route::delete('/oauth/logout', LogoutController::class)->name('logout');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth:api', 'role:user']], function () {
    Route::get('', ProfileController::class)->name('profile');
    Route::apiResource('media', UserMediaController::class)
        ->only(['index', 'store', 'destroy']);
});
