@props(['value'  => '', 'autofocus' => ''])


@php

    $hasCustomClass = $attributes->get('class') !== null;

    // Определение классов по умолчанию.
    $defaultClasses = 'form-control';

    // Если пользовательский класс передан, используем его, иначе - классы по умолчанию.
    $classAttribute = $hasCustomClass ? $attributes->get('class') : $defaultClasses;

@endphp


<input {{ $attributes->class([

    $classAttribute,

])->merge([

    'type' => 'text',
    //Возврат старых введёных данных
    'value' => ( (old($attributes->get('name'))) ?: $value),

])  }} {{ $autofocus ? 'autofocus' : '' }}>
