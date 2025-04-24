<?php

namespace App\Modules\User\Domain\Request;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;
use App\Modules\User\App\Data\Enums\UserTypeEnum;
use App\Modules\User\App\Data\Enums\Contact\ContactEnums;

class UpdateMainInfoProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        return [

            "full_name" => ["nullable", "string"],
            "email" => ["nullable", "email"],
            "type" => ["nullable", Rule::enum(UserTypeEnum::class) ],

            "contact" => ["nullable", "array"],
            "contact.*.name"  => ["required", "required_with:contact.*.url", Rule::enum(ContactEnums::class)],
            "contact.*.url"  => ["nullable" , "string"],

            "my_project_tagify" => ["nullable", "json"],
            // "profile_avatar" => ['nullable', File::types(['jpeg' , 'png', 'jpg', 'gif', 'svg', 'WebP'])->max(8192)],

            "password" => ["nullable", "string", "min:5", "max:50", "confirmed"],

        ];
    }
}
