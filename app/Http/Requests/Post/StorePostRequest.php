<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class StorePostRequest extends FormRequest
{
    public function messages()
    {
        return [

            'title.required' => 'Заголовок обязателен для заполнение.',
            'title.max' => 'Поле не должно быть больше 100 символов.',
            // 'imgMain.max' => 'Максимальный размер изображение 2048 килобайта.',
            // 'imgMain.required' => 'Обложка для поста обязательна.',
            // 'content.required' => 'Содержание поста не должно быть пустым.',
            // 'content.min' => 'Минимальный размер поста 100 символов.',
            // 'imgAlt.string' => 'Минимальный размер поста 100 символов.',
            // 'imgAlt.required' => 'Содержание описание изображение, не должно быть пустым.',
            // 'imgAlt.max' => 'Максимальный размер описание изображение 200 символов.',

        ];
    }

    protected function failedValidation(Validator $validator)
    {

        // Генерируем редирект с исключенными данными из сохранения.
        $response = redirect()->to($this->getRedirectUrl())
                            ->withInput(request()->except('content'))
                            ->withErrors($validator->errors(), $this->errorBag);

        throw new HttpResponseException($response);
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

            'info_post' => ['required', 'string', 'min:30', 'max:350'],

            'imgMain' => ['required', 'image', 'max:2048'],

            'imgAlt' => ['nullable', 'string', 'max:200'],
        ];
    }
}
