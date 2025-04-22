<?php

namespace App\Modules\User\App\Data\Enums\Contact;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;
use App\Modules\User\App\Data\Enums\UserTypeEnum;

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
            "type" => ["nullable", "string", [Rule::enum(UserTypeEnum::class)] ],

            "contact" => ["nullable", "array"],
            "contact.*.name"  => ["required", "string", [Rule::enum(ContactEnums::class)]],
            "contact.*.url"  => ["required", "string"],

            "projects" => ["nullable", "json"],
            "url_avatar" => ['nullable', File::types(['jpeg' , 'png', 'jpg', 'gif', 'svg', 'WebP'])->max(8192)],

            "password" => ["nullable", "string", "min:5", "max:50", "confirmed"],

        ];
    }
}
