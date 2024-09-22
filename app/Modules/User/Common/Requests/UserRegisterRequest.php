<?php

namespace App\Modules\User\Common\Requests;

use App\Modules\User\App\Data\Enums\UserTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => ['required', 'string', 'max:50', 'unique:users,login'],
            'email' => ['required', 'string', 'max:50', 'email', 'unique:users,email'],
            'type' => ['required' , Rule::enum(UserTypeEnum::class)],
            'password' => ['required', 'string', 'min:5', 'max:50', 'confirmed'],
            'agreement' => ['accepted'],
        ];
    }
}
