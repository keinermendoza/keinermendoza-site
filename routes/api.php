<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAPIController;
use App\Http\Controllers\ProjectAPIController;
use App\Http\Controllers\ImageAPIController;
use App\Http\Controllers\TagAPIController;
use App\Http\Controllers\SkillAPIController;
use App\Http\Controllers\ContactMessageAPIController;

Route::middleware(['auth:sanctum', 'admin'])->prefix('v1')->name('admin.')->group(function () {
    Route::apiResource('/users', UserAPIController::class);
    Route::apiResource('/skills', SkillAPIController::class);
    Route::apiResource('/projects', ProjectAPIController::class);
    Route::apiResource('/tags', TagAPIController::class);
    Route::apiResource('/images', ImageAPIController::class)->except(['public']);
    Route::apiResource('/messages', ContactMessageAPIController::class)->except(['store']);

});

Route::post('v1/messages', [ContactMessageAPIController::class, 'store'])->name('message.store');
Route::get('v1/images/{image}', [ImageAPIController::class, 'public'])->name('image.public');
