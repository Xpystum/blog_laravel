<?php

namespace App\Http\Controllers\User\Post\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\Data\ValueObject\CommentVO;
use App\Modules\Post\Domain\Services\CommentService;
use App\Modules\Post\Domain\Requests\CreateCommentRequest;

class PostCommentController extends Controller
{
    public function store(
        Post $post,
        CreateCommentRequest $request,
        CommentService $servComment,
    ) {

        $validated = $request->validated();


        /** @var CommentVO */
        $commentVO = CommentVO::make(
            post_id: $post->id,
            user_id: Auth::user()->id,
            value: $validated['value'],
        );

        /**
         * создаём комментарий
         * @var FunctionResult
         */
        $status = $servComment->createComment($commentVO);

        $post->load('comments');

        $alert = $status->success ? ['alert_success' => $status->returnValue]  : ['alert_danger' => $status->errorMessage];


        return redirect()->back()->with($alert, 'Комментарий успешно добавлен');
    }
}
