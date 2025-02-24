@props(['path_img', 'alt' => 'Описание'])

@php

    if ( is_null($path_img) || empty($path_img) ) {

        // аналогично onerror, но теперь у нас не будет ошибки в консоли
        $path_img = asset('storage/img/chilling_code.jpg');

        // dd(1);

    } else {
        $path_img = asset($path_img);
    }

@endphp

<img {{  $attributes->class($attributes->get('class', 'hover:scale-105 w-full h-full object-cover')) }}

    src="{{ $path_img ? asset($path_img) : '' }}"
    alt="{{ $alt }}"

/>

