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
            Route::get('/{id}', [PostController::class, 'show'])->name('users.posts.view.preview');
            /** PAGES END */

            Route::post('/', [PostController::class, 'store'])->name('user.posts.store');
            Route::patch('/{post:id}', [PostController::class, 'update'])->name('user.posts.update');
        }

        Route::post('/{post:id}/like', [PostController::class, 'likePost'])->name('users.posts.like')->withoutMiddleware('auth');

        Route::post('/{post:id}/comments', [PostCommentController::class, 'store'])->name('users.posts.comments.store');



    });

    Route::prefix('/profiles')->group(function () {

        Route::get('/', [ProfileController::class, 'index'])->name('user.profiles');

    });





});

