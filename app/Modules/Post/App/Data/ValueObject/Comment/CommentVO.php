<?php

namespace App\Modules\Post\App\Data\ValueObject\Comment;

use Illuminate\Support\Arr;
use Illuminate\Contracts\Support\Arrayable;
use App\Modules\Base\Traits\FilterArrayTrait;

readonly class CommentVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public int $post_id,
        public int $user_id,
        public string $value,
    ) {}

    public static function make(

        int $post_id,
        int $user_id,
        string $value,

    ) : self {

        // $value = Purifier::clean($value); //очищаем контент из редактора от опасных значений от xss атаки

        return new self(
            post_id: $post_id,
            user_id: $user_id,
            value: $value,
        );

    }


    public function toArray() : array
    {
        return [
            "post_id" => $this->post_id,
            "user_id" => $this->user_id,
            "value" => $this->value,
        ];
    }

    public static function arrayToObject(array $data) : self
    {
        return self::make(
            post_id: Arr::get($data, 'post_id'),
            user_id: Arr::get($data, 'user_id'),
            value: Arr::get($data, 'value'),
        );
    }


}
