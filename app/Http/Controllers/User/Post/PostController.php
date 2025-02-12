<?php

namespace App\Http\Controllers\User\Post;

use Illuminate\Http\UploadedFile;

use App\Http\Controllers\Controller;
use App\Modules\Post\App\DTO\CreatePostDTO;
use App\Modules\Post\App\Data\ValueObject\PostVO;
use App\Modules\Post\App\DTO\UpdatePostDTO;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\Domain\Requests\Post\CreatePostRequest;
use App\Modules\Post\Domain\Requests\Post\UpdatePostRequest;
use App\Modules\Post\Domain\Services\PostSerivce;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    public function store(
        CreatePostRequest $request,
        // Request $request,
        PostSerivce $postSerivce,
    ) {

        /** @var PostVO */
        $postVO = $request->createPostVO();

        /** @var ?UploadedFile */
        $file_img_cover = $request->getFile();

        /** @var Post */
        $model = $postSerivce->createPost(
            CreatePostDTO::make(
                vo: $postVO,
                file: $file_img_cover,
            )
        );

        abort_unless($model, 'Ошибка на стороне сервера.', 500);

        $alert = 'Статья успешно создана.';

        return redirect()->intended($default = '/')->with($alert);

    }

    public function update(
        Post $post,
        UpdatePostRequest $request,
        PostSerivce $postSerivce,
    ) {

        /** @var PostVO */
        $postVO = $request->createPostVO();

        /** @var ?UploadedFile */
        $file_img_cover = $request->getFile();

        /** @var UpdatePostDTO */
        $dto = UpdatePostDTO::make(
            vo: $postVO,
            post: $post,
            file: $file_img_cover,
        );

        $status = $postSerivce->updatePost($dto);

        abort_unless($status, 'Ошибка на стороне сервера.', 500);

        $alert = 'Статья успешно обновлена.';

        return redirect()->intended($default = '/')->with($alert);

    }

    /** PAGES GET */
    public function updateView(int $postId)
    {

        /** @var ?Post */
        $post = Post::where('id', $postId)->where('user_id', Auth::user()->id)
            ->first();

        abort_unless($post, 403, 'У вас нету доступа для редактирование этой статьи.');

        return view('pages.text-editor.text-editor-update_includes', compact('post'));
    }

    //страничка
    public function createView(?int $postId = null) {


        /** @var ?Post */
        $post = Post::with(['comments', 'users'])->find($postId);


        return view('pages.text-editor.text-editor_includes', compact('post'));
    }


    public function show(int $idPost)
    {
        $post = Post::with('cover_img', 'comments.user')->find($idPost);

        abort_unless($post, 404);

        return view('pages.user.post.preview', compact('post'));
    }

}
