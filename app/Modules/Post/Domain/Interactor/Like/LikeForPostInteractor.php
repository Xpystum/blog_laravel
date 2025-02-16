<?php

namespace App\Modules\Post\Domain\Interactor\Post;

use Illuminate\Support\Facades\DB;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\Data\ValueObject\Like\LikeForPostVO;
use App\Modules\Post\Domain\Actions\Post\FirstOrCreatePostAction;

class CreatePostInteractor
{

    public function execute(LikeForPostVO $vo) : Post
    {
        return $this->run($vo);
    }

    private function run(LikeForPostVO $vo) : Post
    {

        /** @var Post */
        $model = DB::transaction(function () use ($vo) {

            $model = FirstOrCreatePostAction::make($vo);

        });

        return $model;
    }



}
