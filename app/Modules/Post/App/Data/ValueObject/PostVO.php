<?php

namespace App\Modules\Post\App\Data\ValueObject;

use App\Modules\Base\Traits\FilterArrayTrait;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Mews\Purifier\Facades\Purifier;

class PostVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public string $title,
        public string $content,
        public ?UploadedFile $path_img_cover_post,
        public int $user_id,
    ) {}

    public static function make(

        string $title,
        string $content,
        int $user_id,
        ?string $path_img_cover_post = null,


    ) : self {

        //очищаем контент из редактора от опасных значений от xss атаки
        $content = Purifier::clean($content);

        return new self(
            title: $title,
            content: $content,
            path_img_cover_post: $path_img_cover_post,
            user_id: $user_id,
        );

    }

    public function toArray() : array
    {
        return [
            "title" => $this->title,
            "content" => $this->content,
            "path_img_cover_post" => $this->path_img_cover_post,
            "user_id" => $this->user_id,
        ];
    }

    public static function arrayToObject(array $data) : self
    {
        /** @var ?UploadedFile */ // Получаем объект файла
        $file = isset($data['cover_img_post']) ? $data['cover_img_post'] : null;

        return self::make(
            title: Arr::get($data, 'title'),
            content: Arr::get($data, 'content'),
            user_id: Arr::get($data, 'user_id'),
            path_img_cover_post: Arr::get($file?->getPathname(), 'path_img_cover_post' , null),
        );
    }


}
