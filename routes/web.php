<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\Api\ImageController;

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Skill;

Route::get('/', function () {
    return view('welcome', [
        "posts" => Post::public()->with('tags')->get(),
        "projects" => Project::public()->with('tags')->get(),
        "skills" => Skill::public()->get()
    ]);
})->name('welcome');

Route::prefix('projetos')->name('projects.')->group(function() {

    Route::get('/', function () {
        return view('projects.index', [
            "projects" => Project::public()->with('tags')->get(),
        ]);
    })->name('index');

    Route::get('/{project:slug}', function (Project $project ) {
        return view('projects.show', [
            "project" => $project
        ]);
    })->name('show');

});



Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function() {
            return redirect()->route('projects.index');
        })->name('dashboard');

        Route::prefix('projects')->name('projects.')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::post('/', [ProjectController::class, 'store'])->name('store');
            Route::get('/create', [ProjectController::class, 'create'])->name('create');
            Route::get('/{project}', [ProjectController::class, 'edit'])->name('edit');
            Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
            Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::post('/', [PostController::class, 'store'])->name('store');
            Route::get('/create', [PostController::class, 'create'])->name('create');
            Route::get('/{post}', [PostController::class, 'edit'])->name('edit');
            Route::put('/{post}', [PostController::class, 'update'])->name('update');
            Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('tags')->name('tags.')->group(function () {
            Route::get('/', [TagController::class, 'index'])->name('index');
            Route::post('/', [TagController::class, 'store'])->name('store');
            Route::get('/create', [TagController::class, 'create'])->name('create');
            Route::get('/{tag}', [TagController::class, 'edit'])->name('edit');
            Route::put('/{tag}', [TagController::class, 'update'])->name('update');
            Route::delete('/{tag}', [TagController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('assets')->name('assets.')->group(function () {
            Route::get('/', [AssetController::class, 'index'])->name('index');
            Route::post('/', [AssetController::class, 'store'])->name('store');
            Route::get('/create', [AssetController::class, 'create'])->name('create');
            Route::get('/{asset}', [AssetController::class, 'edit'])->name('edit');
            Route::put('/{asset}', [AssetController::class, 'update'])->name('update');
            Route::delete('/{asset}', [AssetController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('images')->name('images.')->group(function () {
            Route::get('/', [ImageController::class, 'index'])->name('index');
            Route::post('/', [ImageController::class, 'store'])->name('store');
        });

    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
