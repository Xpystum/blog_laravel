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

