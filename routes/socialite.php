<?php

use App\Http\Controllers\Socialite\GitHubController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

// Route::get('/auth/redirect', function () {
//     return Socialite::driver('github')->redirect();
// });

// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->user();

//     // $user->token
// });

Route::get('/auth/redirect', [GitHubController::class, 'redirect']);
Route::get('/auth/callback', [GitHubController::class, 'callback']);
