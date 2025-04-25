<?php

namespace App\Http\Controllers\User\Profile;

use App\Modules\User\App\Data\DTO\Profile\UpdateProfileDTO;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\Domain\Request\UpdateMainInfoProfileRequest;
use App\Modules\User\Domain\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    public function index()
    {
        return view('pages/user/profile/prewie-profile');
    }

    public function mainInfoUpdate(
        UpdateMainInfoProfileRequest $request,
        ProfileService $profileService,

    ) {

        $validated = $request->validated();

        /** @var UpdateProfileDTO */
        $updateProfileDTO = $request->createUpdateProfileDTO()->setUser(Auth::user());

        /** @var Profile */
        $profile = $profileService->updateProfile($updateProfileDTO);

        dd($profile);

    }
}
