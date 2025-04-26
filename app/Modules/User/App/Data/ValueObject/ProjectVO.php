<?php

namespace App\Modules\User\App\Data\ValueObject;

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
        int $profile_id,

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

    public static function arrayToObject(string $data, int $profile_id) : array
    {

        $array = json_decode($data['my_project_tagify']);

        $arrayReturn = [];

        foreach ($array as $value) {
            $arrayReturn[] = ProjectVO::make(
                project_json: $value->value,
                profile_id: $profile_id,
            );
        }

        return $arrayReturn;
    }

}
