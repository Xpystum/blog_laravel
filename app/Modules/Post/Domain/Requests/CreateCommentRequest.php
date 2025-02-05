<?php

namespace App\Modules\Post\Domain\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::hasUser();
    }


    public function rules(): array
    {
        return [
            "value" => ['required', 'string' ,' min:1' ,'max:1000'],
        ];
    }



}
