<?php

use App\Http\Controllers\Entity\Blog\BlogController;
use App\Http\Controllers\Entity\Posts\CommentController;
use App\Http\Controllers\Entry\LoginController;
use App\Http\Controllers\Entry\RegisterController;
use App\Http\Controllers\TestController;
use App\Modules\Email\Domain\Notifications\EmailConfirmationNotification;
use App\Modules\User\Domain\Models\User;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index')->name('home');

Route::get('/test', [TestController::class, 'index'])->name('test');

Route::middleware('guest')->group(function() {

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

});


// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'store'])->name('login.store');


Route::get('/blog', [BlogController::class , 'index'])->name('blog');
Route::get('/blog/{post}', [BlogController::class , 'show'])->name('blog.show');
Route::post('/blog/{post}/like', [BlogController::class , 'like'])->name('blog.like');



Route::resource('/posts/{post}/comments', CommentController::class);

Route::get('/test', function () {

    return (new EmailConfirmationNotification)->toMail(User::query()->first());

});
