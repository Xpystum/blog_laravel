<?php

use App\Http\Controllers\Socialite\GitHubController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


    //GitHub
Route::get('/social/github/redirect', [GitHubController::class, 'redirect']);
Route::get('/social/github/callback', [GitHubController::class, 'callback']);
