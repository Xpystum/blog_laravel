<?php

use Illuminate\Support\Facades\Route;

if( ! function_exists('active_link') ){

    function active_link(string $name, string $classNotActive = 'active-link'): string
    {
        $classNotActive = "block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700";
        $classActive = "block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500";
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

