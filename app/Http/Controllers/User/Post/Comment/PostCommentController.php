<?php

namespace App\Http\Controllers\User\Post\Comment;

use App\Http\Controllers\Controller;
use App\Modules\Post\App\Data\ValueObject\Comment\CommentVO;
use Illuminate\Support\Facades\Auth;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\Domain\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostCommentController extends Controller
{
    public function store(
        Post $post,
        Request $request,
        CommentService $servComment,
    ) {

        //проверка валидации
        $validated = Validator::make($request->all(), [
           "value" => ['required', 'string' ,' min:1' ,'max:1000'],
        ]);

        if ($validated->fails()) {
            //выкидываем кастомную ошибку alert_error
            return redirect()->back()
            ->withErrors($validated, 'value')
            ->with('alert_error', ['exception_message' => 'Комментарий не должен превышать 1000 символов.']);
        }

        //получаем валидированные данные
        $validated= $validated->validated();


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
