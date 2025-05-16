<?php

namespace App\Modules\User\App\Data\ValueObject;

use Illuminate\Contracts\Support\Arrayable;
use App\Modules\Base\Traits\FilterArrayTrait;

readonly class CheckSkillVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public string $name,
        public bool $status,
        public int $profile_id,
    ) {}

    public static function make(

        string $name,
        string $status,
        int $profile_id,

    ) : self {


        return new self(
            name: $name,
            status: $status,
            profile_id: $profile_id,
        );

    }

    public function toArray() : array
    {
        return [
            "name" => $this->name,
            "status" => $this->status,
            "profile_id" => $this->profile_id,
        ];
    }

    public static function arrayToObject(array $data, int $profile_id) : array
    {

        $arrayNew = [];

        foreach ($data as $value) {

            if(is_null($value['url'])) { continue; }

            $arrayNew[] = CheckSkillVO::make(
                name: $value['name'],
                status: $value['status'],
                profile_id: $profile_id,
            );
        }


       return $arrayNew;
    }



}
