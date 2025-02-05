<?php

namespace App\Http\Controllers\User\Post;

use Illuminate\Http\UploadedFile;

use App\Http\Controllers\Controller;
use App\Modules\Post\App\DTO\CreatePostDTO;
use App\Modules\Post\App\Data\ValueObject\PostVO;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\Domain\Services\PostSerivce;
use App\Modules\Post\Domain\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function store(
        CreatePostRequest $request,
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


        $alert = 'Статья успешно создана.';

        return redirect()->intended($default = '/')->with($alert);

    }

    /** PAGES GET */
    public function update(int $postId)
    {

        /** @var ?Post */
        $post = Post::where('id', $postId)->where('user_id', Auth::user()->id)
            ->first();

        abort_unless($post, 403, 'У вас нету доступа для редактирование этой статьи.');

        return view('pages.text-editor.text-editor-update_includes', compact('post'));
    }

    public function create(?int $postId = null) {


        /** @var ?Post */
        $post = Post::find($postId);


        return view('pages.text-editor.text-editor_includes', compact('post'));
    }


    public function show(int $idPost)
    {
        $post = Post::with('cover_img', 'comments')->find($idPost);

        abort_unless($post, 404);

        return view('pages.user.post.preview', compact('post'));
    }

}
