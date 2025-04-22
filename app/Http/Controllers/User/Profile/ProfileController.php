<?php

namespace App\Http\Controllers\User\Profile;

use App\Modules\User\Domain\Request\UpdateMainInfoProfileRequest;

class ProfileController
{
    public function index()
    {
        return view('pages/user/profile/prewie-profile');
    }

    public function mainInfoUpdate(
        UpdateMainInfoProfileRequest $request
    ) {

        $validated = $request->validated();
        dd($validated);

    }
}
