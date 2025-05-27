<?php

namespace App\Modules\User\Presentation\web\Livewire;

use App\Modules\Post\Domain\Models\Post;
use App\Modules\User\Domain\Models\Profile;
use Livewire\Component;

class ProfileInfoUserPostsComponent extends Component
{

    public $posts;
    public Profile $profile;

    public function mount(Profile $profile, $posts)
    {
        $this->posts = $posts;
        $this->profile = $profile;
    }

    public function render()
    {
        return view('livewire.profile.profile-info-user-posts');
    }
}
