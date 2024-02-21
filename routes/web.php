<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/register', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'store'])->name('login.store');



Route::get('blog', [BlogController::class , 'index'])->name('blog');
Route::get('blog/{post}', [BlogController::class , 'show'])->name('blog.show');
Route::post('blog/{post}/like', [BlogController::class , 'like'])->name('blog.like');



Route::resource('/posts/{post}/comments', CommentController::class);
