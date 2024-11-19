<?php

namespace App\Http\Requests;

use App\Modules\User\App\Data\Enums\UserTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegistrationRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "login" => ['required', 'string' , 'min:3', 'max:40'] ,
            "email" => ['required', 'email', 'unique:users,email'] ,
            "type" => ['required', Rule::enum(UserTypeEnum::class)->only([UserTypeEnum::designer, UserTypeEnum::developer, UserTypeEnum::other])] ,
            "password" => ['required', 'confirmed', Password::min(6)->mixedCase()->numbers()] ,
            "agreement" => ['required', 'boolean'] ,
        ];
    }
}
