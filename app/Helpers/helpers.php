<?php

use Illuminate\Support\Facades\Route;

if( ! function_exists('active_link') ){

    function active_link(string $name, string $class = 'active'): string
    {
        return Route::is($name) ? $class : '';
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

