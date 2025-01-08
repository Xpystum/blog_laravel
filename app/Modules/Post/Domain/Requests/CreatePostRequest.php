<?php

namespace App\Modules\Post\Domain\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "content" => ['required', 'string' , 'confirmed', 'min:4', 'max:65000'],
            "title" => ['required', 'string' , 'min:100', 'max:125'],
        ];
    }
}
