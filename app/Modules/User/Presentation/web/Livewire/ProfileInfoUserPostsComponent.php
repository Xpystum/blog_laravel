<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Livewire\Component;

class ProfileInfoUserPostsComponent extends Component
{

    public $posts;

    public function mount($posts)
    {
        $this->posts = $posts;
    }

    public function render()
    {
        return view('livewire.profile.profile-info-user-posts');
    }
}
