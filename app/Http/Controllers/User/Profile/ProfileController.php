<?php

namespace App\Http\Controllers\User\Profile;

class ProfileController
{
    public function index()
    {
        return view('includes.profile.main.profile-main_index');
    }
}
