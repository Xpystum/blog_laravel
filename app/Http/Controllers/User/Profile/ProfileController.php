<?php

namespace App\Http\Controllers\User\Profile;

class ProfileController
{
    public function index()
    {
        return view('includes.user.profile.main.profile-main_index');
    }
}
