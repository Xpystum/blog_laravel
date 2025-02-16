<?php

namespace App\Modules\Post\Domain\Services;

use App\Modules\Post\App\Data\ValueObject\Like\LikeForPostVO;
use App\Modules\Post\Domain\Interactor\Like\LikeForPostInteractor;
use App\Modules\Post\Domain\Models\LikeForPost;

class LikeService
{
    public function __construct(
        private LikeForPostInteractor $likeForPostInteractor,
    ) {}


    public function setLike(LikeForPostVO $vo) : LikeForPost
    {
        return $this->likeForPostInteractor->execute($vo);
    }
}
