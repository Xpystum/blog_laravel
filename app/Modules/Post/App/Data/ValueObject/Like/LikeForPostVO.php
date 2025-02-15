<?php

namespace App\Modules\Post\App\Data\ValueObject\Like;

use Illuminate\Support\Arr;
use Illuminate\Contracts\Support\Arrayable;
use App\Modules\Base\Traits\FilterArrayTrait;

readonly class LikeForPostVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(

        public int $post_id,
        public ?int $user_id,
        public string $user_agent,
        public string $ip,

    ) {}

    public static function make(

        int $post_id,
        string $user_agent,
        string $ip,
        ?int $user_id = null,


    ) : self {

        return new self(
            post_id: $post_id,
            user_id: $user_id,
            user_agent: $user_agent,
            ip: $ip,
        );

    }


    public function toArray() : array
    {
        return [
            "post_id" => $this->post_id,
            "user_id" => $this->user_id,
            "user_agent" => $this->user_agent,
            "ip" => $this->ip,
        ];
    }

    public static function arrayToObject(array $data) : self
    {
        return self::make(
            post_id: Arr::get($data, 'post_id'),
            user_agent: Arr::get($data, 'user_agent'),
            ip: Arr::get($data, 'ip'),
            user_id: Arr::get($data, 'user_id', null),
        );
    }


}
