<?php

use App\Http\Controllers\User\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->middleware(['auth'])->group(function () {


    Route::prefix('/profile')->group(function () {

        Route::get('/', [ProfileController::class, 'index'])->name('user.profile');

    });


});

