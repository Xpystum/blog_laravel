<?php

namespace App\Modules\Post\Domain\Services;

use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\DTO\CreatePostDTO;
use App\Modules\Post\Domain\Interactor\CreatePostInteractor;

class PostSerivce
{
    public function __construct(
        private CreatePostInteractor $createPostInteractor
    ) { }


    public function createPost(CreatePostDTO $dto) : Post
    {
        return $this->createPostInteractor->execute($dto);
    }
}
