<?php

namespace App\Http\Controllers\User\Profile;

use Illuminate\Support\Facades\Auth;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\Domain\Services\ProfileService;
use App\Modules\User\App\Data\DTO\Profile\UpdateProfileDTO;
use App\Modules\User\Domain\Request\UpdateMainInfoProfileRequest;
use App\Modules\User\Domain\Request\UpdatePersonalInfoUpdate;

class ProfileController
{
    public function index()
    {
        $user = Auth::user();

        $profile = Auth::user()->profile;

        return view('pages/user/profile/prewie-profile', ['profile' => $profile]);
    }

    //обновляем значение которые находятся на вверху страницы у user
    public function mainInfoUpdate(
        UpdateMainInfoProfileRequest $request,
        ProfileService $profileService,

    ) {

        /** @var UpdateProfileDTO */
        $updateProfileDTO = $request->createUpdateProfileDTO()->setUser(Auth::user());

        /** @var Profile */
        $profile = $profileService->updateProfileGeneral($updateProfileDTO);

        return redirect()->back()->with(compact('profile'));

    }

    //обновляем персональную информацию user - skill, about и т.д
    // public function personalInfoUpdate(
    //     UpdatePersonalInfoUpdate $request,
    //     ProfileService $profileService,
    // ) {

    //     /** @var UpdateProfileDTO */
    //     $updateProfileDTO = $request->createUpdateProfileDTO()->setUser(Auth::user());

    //     /** @var Profile */
    //     $profile = $profileService->updateProfile($updateProfileDTO);

    //     return redirect()->back()->with(compact('profile'));

    // }
}
