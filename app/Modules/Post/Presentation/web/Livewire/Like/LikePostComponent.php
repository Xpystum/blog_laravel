<?php

namespace App\Modules\Post\Presentation\web\Livewire\Like;

use App\Modules\Post\App\Data\ValueObject\Like\LikeForPostVO;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\Domain\Services\LikeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikePostComponent extends Component
{

    public Post $post;

    public function setLike(
        Request $request,
        LikeService $service,
    ) {

        dd($request->header('User-Agent'));

        $vo = LikeForPostVO::make(
            post_id: $this->post->id,
            user_id: Auth::user() ?? null,
            user_agent: $request->header('User-Agent'),
            ip: $request->ip(),
        );

        dd($vo);
    }

    public function render()
    {
        return view('livewire.post.like.like-post');
    }
}
