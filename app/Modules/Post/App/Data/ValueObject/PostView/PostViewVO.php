<?php

namespace App\Modules\Post\App\Data\ValueObject\PostView;

use Exception;
use Illuminate\Contracts\Support\Arrayable;
use App\Modules\Base\Traits\FilterArrayTrait;

class PostViewVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public int $post_id,
        public string $user_agent,
    ) {}

    public static function make(

        string $post_id,
        string $user_agent,


    ) : self {

        return new self(
            post_id: $post_id,
            user_agent: $user_agent,
        );

    }

    public function toArray() : array
    {
        return [
            "post_id" => $this->post_id,
            "user_agent" => $this->user_agent,
        ];
    }

}
