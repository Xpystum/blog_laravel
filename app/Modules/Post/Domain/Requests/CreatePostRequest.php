<?php

namespace App\Modules\Post\Domain\Requests;

use App\Modules\Post\App\Data\ValueObject\PostVO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class CreatePostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::hasUser();
    }


    public function rules(): array
    {
        return [
            "title" => ['required', 'string', 'min:4', 'max:65000'],
            "content" => ['required', 'string' , 'min:100', 'max:125'],
            "cover_img_post" => ['nullable', File::types(['jpeg' , 'png', 'jpg', 'gif', 'svg', 'WebP'])->max(8192)],
        ];
    }


    protected function passedValidation(): void
    {
        //добавляем user_id для того что бы сразу сделать VO объект для создание Post
        $this->merge(['user_id' => Auth::user()->id]);
    }

    public function createPostVO() : PostVO
    {
        return PostVO::arrayToObject($this->validationData());
    }
}
