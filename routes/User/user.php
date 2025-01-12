<?php

use App\Http\Controllers\User\Post\PostController;
use App\Http\Controllers\User\Profile\ProfileController;
use Illuminate\Support\Facades\Route;




Route::prefix('/users')->middleware(['auth'])->group(function () {

    Route::prefix('/posts')->group(function() {

            /** PAGES START */
        Route::get('/create', [PostController::class, 'create'] )->name('user.posts.view.create');
        Route::get('/update/{id}', [PostController::class, 'update'])->name('user.posts.view.update');
            /** PAGES END */

        Route::post('/', [PostController::class, 'store'])->name('user.posts.store');

    });

    Route::prefix('/profiles')->group(function () {

        Route::get('/', [ProfileController::class, 'index'])->name('user.profiles');

    });



});

