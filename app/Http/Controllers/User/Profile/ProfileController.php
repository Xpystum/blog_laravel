<?php

namespace App\Http\Controllers\User\Profile;

use Illuminate\Support\Facades\Auth;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\Domain\Services\ProfileService;
use App\Modules\User\App\Data\DTO\Profile\UpdateProfileDTO;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Request\UpdateMainInfoProfileRequest;

class ProfileController
{
    public function index(
        User $user
    ) {


        /** @var Profile */
        $profile = $user->profile->load(
            'skills',
            'checkSkills',
            'contacts',
            'project',
            'user'
        );

        $posts = $user->posts()->limit(10)->with('likes', 'cover_img')->withCount('comments', 'postViews', 'likes')->get();

        /**
         * Общее количество лайков у user по постам
         * @var int
         * */
        $totalLikes = $posts->sum(function($post) {
            return $post->like_count();
        });

        /**
         * Общее количество просмторов у user по постам
         * @var int
        */
        $totalViews = $posts->sum(function($post) {
            return $post->like_count();
        });

        /**
         * Общее количество просмторов у user по постам
         * @var int
        */
        $totalPosts = $user->posts()->count();


        return view('pages/user/profile/prewie-profile', [
            'profile' => $profile,
            'user' => $profile->user,
            'posts' => $posts,
            'totalLikes' => $totalLikes,
            'totalViews' => $totalViews,
            'totalPosts' => $totalPosts,
        ]);
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
