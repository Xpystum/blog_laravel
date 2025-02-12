<?php

namespace App\Modules\Post\Domain\Services;

use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\DTO\CreatePostDTO;
use App\Modules\Post\App\DTO\UpdatePostDTO;
use App\Modules\Post\Domain\Interactor\Post\CreatePostInteractor;
use App\Modules\Post\Domain\Interactor\Post\UpdatePostInteractor;

class PostSerivce
{
    public function __construct(
        private CreatePostInteractor $createPostInteractor,
        private UpdatePostInteractor $updatePostInteractor,
    ) { }


    public function createPost(CreatePostDTO $dto) : Post
    {
        return $this->createPostInteractor->execute($dto);
    }

    public function updatePost(UpdatePostDTO $dto) : bool
    {
        return $this->updatePostInteractor->execute($dto);
    }

}
