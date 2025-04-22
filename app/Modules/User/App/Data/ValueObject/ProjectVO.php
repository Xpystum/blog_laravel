<?php

namespace App\Modules\User\App\Data\ValueObject;

use Illuminate\Support\Arr;
use Illuminate\Contracts\Support\Arrayable;
use App\Modules\Base\Traits\FilterArrayTrait;

readonly class ProjectVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public string $project_json,
        public int $profile_id,
    ) {}

    public static function make(

        string $project_json,
        string $profile_id,


    ) : self {


        return new self(
            project_json: $project_json,
            profile_id: $profile_id,

        );

    }

    public function toArray() : array
    {
        return [
            "project_json" => $this->project_json,
            "profile_id" => $this->profile_id,
        ];
    }

    public static function arrayToObject(array $data) : self
    {
        return self::make(
            project_json: Arr::get($data, 'project_json'),
            profile_id: Arr::get($data, 'profile_id'),
        );
    }

}
