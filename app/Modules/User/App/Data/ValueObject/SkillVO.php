<?php

namespace App\Modules\User\App\Data\ValueObject;

use Illuminate\Support\Arr;
use Illuminate\Contracts\Support\Arrayable;
use App\Modules\Base\Traits\FilterArrayTrait;

readonly class SkillVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public string $name,
        public int $percent,
        public int $profile_id,
    ) {}

    public static function make(

        int $name,
        int $percent,
        int $profile_id,

    ) : self {

        return new self(
            name:  $name,
            percent: $percent,
            profile_id: $profile_id,
        );

    }

    public function toArray() : array
    {
        return [
            "name" => $this->name,
            "percent" => $this->percent,
            "profile_id" => $this->profile_id,
        ];
    }

    public static function arrayToObject(array $data) : self
    {
        return self::make(
            name: Arr::get($data, 'name'),
            percent: Arr::get($data, 'percent'),
            profile_id: Arr::get($data, 'profile_id'),
        );
    }

}
