@props(['padding' => 'p-3'])

@php
// Проверяем, задан ли пользовательский класс и используем его или 'btn-default'
    $customClass = $attributes->get('class') ? $attributes->get('class') : 'mb-4 border';
@endphp

<div {{ $attributes->class([

    ($attributes->get('class') ? "" : 'mb-4 border') , $padding

])}}>

    {{ $slot }}

</div>
