<?php

namespace App\Http\Controllers\User\Comment;

use App\Http\Controllers\Controller;
use App\Modules\Post\App\Data\ValueObject\CommentVO;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\Domain\Requests\CreateCommentRequest;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function store(
        Post $post,
        CreateCommentRequest $request
    ) {
        
        $validated = $request->validated();

        /** @var CommentVO */
        $commentVO = CommentVO::make(
            post_id: $post->id,
            user_id: Auth::user()->id,
            value: $validated['value'],
        );
    }
}
