<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\Entry\LoginController;
use App\Http\Controllers\Entry\RegisterController;
use App\Http\Controllers\Logout\LogoutController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home.index')->name('home');

Route::get('/test', [TestController::class, 'index'])->name('test');

Route::middleware('guest')->group(function() {

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

});

Route::prefix('/email')->group(function() {

    Route::get('/confirmation', [EmailController::class, 'index'])->name('email.confirmation');
    Route::any('/{emailAccesToken:uuid}/confirm', [EmailController::class, 'confirmation'])->name('email.confirm')->whereUuid('emailAccesToken');
    Route::post('/confirmation/send', [EmailController::class, 'send'])->name('email.send')->whereUuid('email');

});

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

// Route::prefix('user')->group(function() {


// });




