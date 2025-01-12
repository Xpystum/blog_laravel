<?php

namespace App\Modules\Post\App\Data\ValueObject;

use App\Modules\Base\Traits\FilterArrayTrait;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Mews\Purifier\Facades\Purifier;

class PostVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public string $title,
        public string $content,
        public string $content_cover,
        public ?string $post_img_cover_id,
        public int $user_id,
    ) {}

    public static function make(

        string $title,
        string $content,
        int $user_id,
        string $content_cover,
        ?string $post_img_cover_id = null,

    ) : self {

        $content = Purifier::clean($content); //очищаем контент из редактора от опасных значений от xss атаки
        $content_cover = Purifier::clean($content, 'custom_not_html'); //полностью очищаем контент от html

        return new self(
            title: $title,
            content: $content,
            content_cover: $content_cover,
            post_img_cover_id: $post_img_cover_id,
            user_id: $user_id,
        );

    }

    public function setPostImgCover(string $post_img_cover_id) : self
    {
        return self::make(
            title: $this->title,
            content_cover: $this->content_cover,
            content: $this->content,
            post_img_cover_id: $post_img_cover_id,
            user_id: $this->user_id,
        );
    }

    public function toArray() : array
    {
        return [
            "title" => $this->title,
            "content" => $this->content,
            "content_cover" => $this->content_cover,
            "post_img_cover_id" => $this->post_img_cover_id,
            "user_id" => $this->user_id,
        ];
    }

    public static function arrayToObject(array $data) : self
    {
        return self::make(
            title: Arr::get($data, 'title'),
            content: Arr::get($data, 'content'),
            content_cover: '',
            user_id: Arr::get($data, 'user_id'),
            post_img_cover_id: Arr::get($data, 'post_img_cover_id' , null),
        );
    }


}
