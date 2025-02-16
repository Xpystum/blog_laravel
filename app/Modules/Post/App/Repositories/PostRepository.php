<?php

namespace App\Modules\Post\App\Repositories;

use App\Modules\Base\CoreRepository;
use App\Modules\Post\App\Data\ValueObject\Like\LikeForPostVO;
use App\Modules\Post\Domain\Models\LikeForPost;
use App\Modules\Post\Domain\Models\Post as Model;


class PostRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function find($id) : Model
    {
        return $this->query()->find($id);
    }

    public function findLikeForComment(LikeForPostVO $vo) : ?LikeForPost
    {
        return LikeForPost::where('post_id', $vo->post_id)->where(function ($query) use ($vo) {

            #TODO Тут надо ещё делать условие, если user_agent - не изменился, но поменялся ip, то тоже возвращать null
            if ($vo->user_id) {
                $query->orWhere('user_id', $vo->user_id);
            }
            if ($vo->user_agent) {
                $query->orWhere('user_agent', $vo->user_agent);
            }
            if ($vo->ip) {
                $query->orWhere('ip', $vo->ip);
            }

        })->first();
    }


}
