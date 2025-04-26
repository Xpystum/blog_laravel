<?php

namespace App\Modules\User\App\Data\ValueObject;

use Illuminate\Support\Arr;
use Illuminate\Contracts\Support\Arrayable;
use App\Modules\Base\Traits\FilterArrayTrait;

readonly class ContactVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public string $name,
        public string $url,
        public int $profile_id,
    ) {}

    public static function make(

        string $name,
        string $url,
        int $profile_id,

    ) : self {


        return new self(
            name: $name,
            url: $url,
            profile_id: $profile_id,
        );

    }

    public function toArray() : array
    {
        return [
            "name" => $this->name,
            "url" => $this->url,
            "profile_id" => $this->profile_id,
        ];
    }

    public static function arrayToObject(array $data, int $profile_id) : array
    {

        $arrayNew = [];

        foreach ($data as $value) {

            if(is_null($value['url'])) { continue; }

            $arrayNew[] = ContactVO::make(
                name: $value['name'],
                url: $value['url'],
                profile_id: $profile_id,
            );
        }


       return $arrayNew;
    }

}
