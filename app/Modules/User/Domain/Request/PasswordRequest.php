<?php

namespace App\Modules\User\Domain\Request;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "password" => ['required', 'string' ,'confirmed'],
        ];
    }
}
