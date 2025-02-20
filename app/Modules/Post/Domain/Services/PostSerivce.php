<?php

namespace App\Modules\Post\Domain\Services;

use App\Modules\Post\App\Data\ValueObject\PostView\PostViewVO;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\DTO\CreatePostDTO;
use App\Modules\Post\App\DTO\UpdatePostDTO;
use App\Modules\Post\Domain\Actions\PostView\CreatePostViewAction;
use App\Modules\Post\Domain\Interactor\Post\CreatePostInteractor;
use App\Modules\Post\Domain\Interactor\Post\UpdatePostInteractor;
use App\Modules\Post\Domain\Models\PostView;

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

    /**
     * Создаём или находим PostView (просмотренный пост данного пользователя с device)
     * @var PostViewVO $vo
     *
     * @return PostView
     */
    public function createOrFindPostView(PostViewVO $vo) : PostView
    {
        /** @var PostView */
        $PostView = PostView::where('user_agent', $vo->user_agent)->where('post_id', $vo->post_id)->first();

        if(is_null($PostView)) { return CreatePostViewAction::make($vo);  }

        return $PostView;
    }

}
