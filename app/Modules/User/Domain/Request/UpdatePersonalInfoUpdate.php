<?php

namespace App\Modules\User\Domain\Request;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Modules\User\App\Data\Enums\UserTypeEnum;
use App\Modules\User\App\Data\Enums\Contact\ContactEnums;


class UpdatePersonalInfoUpdate extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        return [

            "input" => ["nullable", "array"],
            "contact.*"  => ["required", "numeric"],

        ];
    }


}
