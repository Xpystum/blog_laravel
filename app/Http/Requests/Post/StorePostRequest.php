<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function messages()
    {
        return [
            'title.required' => 'Заголовок обязателен для заполнение.',
            'title.max' => 'Поле не должно быть больше 100 символов.',
            'imgMain.max' => 'Максимальный размер изображение 2048 килобайта.',
            'imgMain.required' => 'Обложка для поста обязательна.',
            'content.required' => 'Содержание поста не должно быть пустым.',
            'content.min' => 'Минимальный размер поста 100 символов.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'title' => ['required', 'string', 'max:100'],

            'content' => ['required', 'string', 'min:100'],

            'imgMain' => ['required', 'image', 'max:2048'],
        ];
    }
}
