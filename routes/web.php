<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;

Route::get('/', function () {
    return view('welcome', [
        "posts" => Post::public()->with('tags')->get(),
        "projects" => Project::public()->with('tags')->get(),
        "tags" => Tag::public()->get()
    ]);
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('dashboard')->group(function () { 
        Route::get('/', function() {
            return view('dashboard');
        })->name('dashboard');
    
        Route::prefix('projects')->name('projects.')->group(function () { 
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::get('/{project}', [ProjectController::class, 'edit'])->name('edit');
            Route::patch('/{project}', [ProjectController::class, 'update'])->name('update');
        });

        Route::prefix('posts')->name('posts.')->group(function () { 
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/{post}', [PostController::class, 'edit'])->name('edit');
            Route::patch('/{post}', [PostController::class, 'update'])->name('update');
        });

        Route::prefix('projects')->name('projects.')->group(function () { 
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::get('/{project}', [ProjectController::class, 'edit'])->name('edit');
            Route::patch('/{project}', [ProjectController::class, 'update'])->name('update');
        });

        Route::prefix('tags')->name('tags.')->group(function () { 
            Route::get('/', [TagController::class, 'index'])->name('index');
            Route::get('/{tag}', [TagController::class, 'edit'])->name('edit');
            Route::patch('/{tag}', [TagController::class, 'update'])->name('update');
        });

    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
