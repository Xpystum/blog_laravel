<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

if( ! function_exists('active_link') ){

    function active_link(string $name, string $classActive = 'active', string $classNotActive = ''): string
    {
        return Route::is($name) ? $classActive : $classNotActive;
    }

}

if( ! function_exists('alert') ){

    function alert(string $text): void
    {
        session(['alert' => $text ]);
    }

}


if( ! function_exists('validate') ){

    function validate(array $attributes, array $rules): array
    {
        return validator($attributes, $rules)->validate();
    }

}

if( ! function_exists('money') ){

    function money(string $amount, string $currency_id): string
    {
        $value = number_format($amount, 2 , '.', ' ');

        return "{$value} {$currency_id}";
    }

}

if (!function_exists('logError')) {
    /**
     * Логирование ошибок с минимально необходимой информацией.
     *
     * @param Exception|Throwable $exception
     * @param array $context Дополнительный контекст
     * @return void
     */
    function logError($exception, array $context = []): void
    {
        Log::error('Произошла ошибка:', array_merge($context, [
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            // Если нужен один уровень стека, добавьте только конкретный вызов
            'trace' => collect($exception->getTrace())->take(1)
        ]));
    }
}

if (!function_exists('logError')) {
    /**
     * Логирование ошибок с минимально необходимой информацией.
     *
     * @param Exception|Throwable $exception
     * @param array $context Дополнительный контекст
     * @return void
     */
    function logError($exception, array $context = []): void
    {
        Log::error('Произошла ошибка:', array_merge($context, [
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            // Если нужен один уровень стека, добавьте только конкретный вызов
            'trace' => collect($exception->getTrace())->take(1)
        ]));
    }
}

if (!function_exists('uuid')) {

    function uuid(string $path = '') : string
    {
        return (string) Str::uuid();
    }

}

if (!function_exists('app_url')) {

    /**
     * Начинать кастомный путь нужно без слеша "/"
     * @param string $path
     *
     * @return string
     */
    function app_url(string $path = '') : string
    {
        return implode('/', [
            trim(config('app.url'), '/'),
            trim($path),
        ]);
    }

}



