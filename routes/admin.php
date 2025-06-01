<?php

use App\Versions\Admin\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::apiResource('teams', TeamController::class)
    ->only('index', 'store', 'destroy');
Route::apiResource('users', TeamController::class)
    ->only('index', 'show');