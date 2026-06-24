<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAPIController;
use App\Http\Controllers\ProjectAPIController;
use App\Http\Controllers\ImageAPIController;



Route::middleware(['auth:sanctum', 'admin'])->prefix('v1')->group(function () {
    Route::apiResource('/users', UserAPIController::class);
    Route::apiResource('/projects', ProjectAPIController::class);
    Route::apiResource('/images', ImageAPIController::class)->except(['show']);
});

Route::get('v1/images/{image}', [ImageAPIController::class, 'public'])->name('image.public');
