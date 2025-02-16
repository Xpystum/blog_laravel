<?php

namespace App\Modules\Post\Domain\Interactor\Like;

use Illuminate\Support\Facades\DB;
use App\Modules\Post\Domain\Models\LikeForPost;
use App\Modules\Post\App\Repositories\PostRepository;
use App\Modules\Post\App\Data\ValueObject\Like\LikeForPostVO;
use App\Modules\Post\Domain\Actions\Like\CreateLikeForPostAction;

class LikeForPostInteractor
{
    public function __construct(
        private PostRepository $postRepository,
    ) {}


    public function execute(LikeForPostVO $vo) : LikeForPost
    {
        return $this->run($vo);
    }

    private function run(LikeForPostVO $vo) : LikeForPost
    {

        /** @var LikeForPost */
        $model = DB::transaction(function () use ($vo) {

            /** @var ?LikeForPost */
            $model = $this->findLikeForPost($vo);

            if($model){

                //меняем стату лайка
                $model->status = !$model->status;
                $model->save();

                return $model;

            }

            /** @var LikeForPost */
            $model = $this->createLikeForPostAction($vo);

            return $model;

        });

        return $model;
    }

    private function createLikeForPostAction(LikeForPostVO $vo) : LikeForPost
    {
        /** @var LikeForPost */
        return CreateLikeForPostAction::make($vo);
    }

    private function findLikeForPost(LikeForPostVO $vo) : ?LikeForPost
    {
        return $this->postRepository->findLikeForComment($vo);
    }



}
