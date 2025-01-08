<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Modules\Post\App\Data\ValueObject\PostVO;
use App\Modules\Post\Domain\Requests\CreatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function store(CreatePostRequest $request)
    {
        /** @var PostVO */
        $postVO = $request->createPostVO();

        dd($postVO);

    }

    // public function index()
    // {

    // }


    // public function show()
    // {

    // }

}
