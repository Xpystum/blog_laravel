<?php

use App\Http\Controllers\User\Post\PostController;
use App\Http\Controllers\User\Profile\ProfileController;
use Illuminate\Support\Facades\Route;




Route::prefix('/users')->middleware(['auth'])->group(function () {

    Route::prefix('/posts')->group(function() {

        Route::post('/', [PostController::class, 'store'])->name('user.posts.store');

    });

    Route::prefix('/profile')->group(function () {

        Route::get('/', [ProfileController::class, 'index'])->name('user.profile');

    });

});

