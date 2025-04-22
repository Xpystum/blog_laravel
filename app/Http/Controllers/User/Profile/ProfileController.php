<?php

namespace App\Http\Controllers\User\Profile;

use App\Modules\User\App\Data\Enums\Contact\UpdateMainInfoProfileRequest;

class ProfileController
{
    public function index()
    {
        return view('pages/user/profile/prewie-profile');
    }

    public function mainInfoUpdate(
        UpdateMainInfoProfileRequest $request
    ) {

    }
}
