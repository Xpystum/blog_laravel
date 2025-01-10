<?php

namespace App\Http\Controllers\User\Post;

use Illuminate\Http\UploadedFile;

use App\Http\Controllers\Controller;
use App\Modules\Post\App\DTO\CreatePostDTO;
use App\Modules\Post\App\Data\ValueObject\PostVO;
use App\Modules\Post\Domain\Services\PostSerivce;
use App\Modules\Post\Domain\Requests\CreatePostRequest;

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

        // dd($model, 1);

        $alert = 'Статья успешно создана.';

        return redirect()->intended($default = '/')->with($alert);

    }

    // public function index()
    // {

    // }


    // public function show()
    // {

    // }

}
