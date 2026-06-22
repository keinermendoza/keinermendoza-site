<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAPIController;

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('/users', UserAPIController::class);
});
