<?php

namespace App\Modules\Post\Presentation\web\Livewire\Like;

use App\Modules\Post\Domain\Models\Post;
use Livewire\Component;

class LikePostComponent extends Component
{

    public Post $post;

    public function increment()
    {
        dd($this->post);
    }

    public function render()
    {
        return view('livewire.post.like.like-post');
    }
}
