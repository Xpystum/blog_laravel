<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EmailController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Logout\LogoutController;

use App\Http\Controllers\User\Post\PostController;
use App\Http\Controllers\User\Profile\ProfileController;
use App\Http\Controllers\User\Post\Comment\PostCommentController;




Route::prefix('/users')->middleware(['auth'])->group(function () {

    Route::prefix('/posts')->group(function() {

        {
                /** PAGES START */
            //страница создание статьи
            Route::get('/create', [PostController::class, 'create'] )->name('users.posts.view.create');
            //страница обновления статьи
            Route::get('/update/{id}', [PostController::class, 'update'])->name('users.posts.view.update');
                //страница просмотра статьи
            Route::get('/{id}', [PostController::class, 'show'])->name('users.posts.view.preview');
            /** PAGES END */

            Route::post('/', [PostController::class, 'store'])->name('user.posts.store');
        }

        Route::post('/{post:id}/comments', [PostCommentController::class, 'store'])->name('users.posts.comments.store');


    });

    Route::prefix('/profiles')->group(function () {

        Route::get('/', [ProfileController::class, 'index'])->name('user.profiles');

    });




});

Route::view('/', 'pages.home.index')->name('home');
Route::post('/test', [TestController::class, 'index'])->name('test');

Route::middleware('guest')->group(function() {

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    //password
    Route::prefix('/password')->group(function() {

        Route::view('/', 'includes.auth.password.password_index')->name('password');
        Route::post('/', [PasswordController::class, 'store'])->name('password.store');
        Route::get('/{passwordReset:uuid}/edit', [PasswordController::class, 'edit'])->name('password.edit')->whereUuid('passwordReset');
        Route::post('/{passwordReset:uuid}/update', [PasswordController::class, 'update'])->name('password.update')->whereUuid('passwordReset');

    });

});

Route::prefix('/email')->group(function() {

    Route::get('/confirmation', [EmailController::class, 'index'])->name('email.confirmation');
    Route::post('/confirmation/send', [EmailController::class, 'send'])->name('email.send')->whereUuid('email');
    Route::any('/{emailAccesToken:uuid}/confirm', [EmailController::class, 'confirm'])->name('email.confirm')->whereUuid('emailAccesToken');


});



Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/text', function () {
    return view('pages.text-editor.text-editor_includes');
});





