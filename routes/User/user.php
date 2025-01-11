<?php

use App\Http\Controllers\User\Post\PostController;
use App\Http\Controllers\User\Profile\ProfileController;
use Illuminate\Support\Facades\Route;




Route::prefix('/users')->middleware(['auth'])->group(function () {

    Route::prefix('/posts')->group(function() {

        Route::get('/create', function () { return view('pages.text-editor.text-editor_includes');});

        Route::post('/', [PostController::class, 'store'])->name('user.posts.store');

    });

    Route::prefix('/profiles')->group(function () {

        Route::get('/', [ProfileController::class, 'index'])->name('user.profiles');

    });



});

