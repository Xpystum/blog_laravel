<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Livewire\Component;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\User\Domain\Models\Profile;

class ProfileInfoUserPostsComponent extends Component
{
    public $posts;

    public Profile $profile;
    public int $postsCount;
    
    public bool $hasButtonMorePost;

    public function mount(Profile $profile, $posts)
    {
        $this->posts = $posts->toBase();
        $this->profile = $profile;

        $this->postsCount = Post::count();

        if ($this->posts->count() >= $this->postsCount) {
            $this->hasButtonMorePost = false;
        } else {
            $this->hasButtonMorePost = true;
        }

    }

    /**
     * Показать больше постов по кнопке
    */
    public function addLoadPost()
    {
        $posts = Post::skip($this->posts->count())->take(10)->get();

        if(!$posts->isEmpty())
        {
            $this->posts = $this->posts->merge($posts);


            if ($this->posts->count() >= $this->postsCount) {
                $this->hasButtonMorePost = false;
            }

        } else {
            $this->hasButtonMorePost = false;
        }
    }

    public function render()
    {
        return view('livewire.profile.profile-info-user-posts');
    }
}
