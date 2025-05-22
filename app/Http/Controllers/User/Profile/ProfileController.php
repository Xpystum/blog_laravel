<?php

namespace App\Http\Controllers\User\Profile;

use Illuminate\Support\Facades\Auth;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\Domain\Services\ProfileService;
use App\Modules\User\App\Data\DTO\Profile\UpdateProfileDTO;
use App\Modules\User\Domain\Request\UpdateMainInfoProfileRequest;

class ProfileController
{
    public function index()
    {
        $user = Auth::user();

        /** @var Profile */
        $profile = Auth::user()->profile->load(
            'skills',
            'checkSkills',
            'contacts',
            'project',
            'user'
        );

        $posts = $user->posts()->limit(10)->get();

        // $posts = $user->posts()->limit(10)->with('likes', 'cover_img')->withCount('comments', 'postViews')->get();



        return view('pages/user/profile/prewie-profile', ['profile' => $profile, 'user' => $profile->user, 'posts' => $posts]);
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

        $profile = $profile->load(
            'skills',
            'checkSkills',
            'contacts',
            'project',
        );

        return redirect()->back()->with(compact('profile'));

    }

}
