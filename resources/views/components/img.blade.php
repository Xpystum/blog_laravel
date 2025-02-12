@props(['path_img', 'alt' => 'Описание'])

@php

    if (file_exists($path_img)) {
        $path_img = asset($path_img);
    } else {
        // аналогично onerror, но теперь у нас не будет ошибки в консоли
        $path_img = asset('storage/img/chilling_code.jpg');
    }

@endphp

<img {{  $attributes->class($attributes->get('class', 'hover:scale-105 w-full h-full object-cover')) }}

    src="{{ $path_img ? asset($path_img) : '' }}"
    alt="{{ $alt }}"

/>

