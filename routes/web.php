<?php

use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\ProjectController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\TagController;
// use App\Http\Controllers\AssetController;
// use App\Http\Controllers\Api\ImageController;

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Skill;

Route::get('/', function () {
    return view('welcome', [
        "projects" => Project::public()->orderBy('importance', 'desc')->with('tags')->get(),
        "skills" => Skill::public()->get()
    ]);
})->name('welcome');

Route::prefix('projetos')->name('projects.')->group(function() {

    Route::get('/', function () {
        return view('projects.index', [
            "projects" => Project::public()->orderBy('importance', 'desc')->with('tags')->get(),
        ]);
    })->name('index');

    Route::get('/{project:slug}', function (Project $project ) {
        return view('projects.show', [
            "project" => $project
        ]);
    })->name('show');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
