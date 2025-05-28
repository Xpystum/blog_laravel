<?php

use App\Http\Controllers\User\Post\Comment\PostCommentController;
use App\Http\Controllers\User\Post\PostController;
use App\Http\Controllers\User\Profile\ProfileController;
use Illuminate\Support\Facades\Route;


Route::prefix('/users')->middleware(['auth'])->group(function () {

    Route::prefix('/posts')->group(function() {

        {
            /** PAGES START */
            //страница создание статьи
            Route::get('/create', [PostController::class, 'createView'] )->name('users.posts.view.create');
            //страница обновления статьи
            Route::get('/update/{id}', [PostController::class, 'updateView'])->name('users.posts.view.update');
                //страница просмотра статьи
            Route::get('/{id}', [PostController::class, 'show'])->name('users.posts.view.preview')->withoutMiddleware('auth');
            /** PAGES END */

            Route::post('/', [PostController::class, 'store'])->name('user.posts.store');
            Route::patch('/{post:id}', [PostController::class, 'update'])->name('user.posts.update');
        }

        Route::post('/{post:id}/like', [PostController::class, 'likePost'])->name('users.posts.like')->withoutMiddleware('auth');

        Route::post('/{post:id}/comments', [PostCommentController::class, 'store'])->name('users.posts.comments.store');


    });

    Route::get('/{user}/profiles', [ProfileController::class, 'index'])->name('users.profiles')->withoutMiddleware(['auth']);

        //страница просмотра статей у user
        Route::get('/{user}/posts', [PostController::class, 'index'])->name('users.posts');

    Route::prefix('/profiles')->group(function () {

        //страница просмотра профиля
        // Route::get('/{profile}', [ProfileController::class, 'index'])->name('users.profiles')->withoutMiddleware(['auth']);
        Route::patch('/update-main', [ProfileController::class, 'mainInfoUpdate'])->name('users.profiles.update.main');


    });


});

