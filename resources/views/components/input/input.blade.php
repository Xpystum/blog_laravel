
@props(['value'  => '' , 'autofocus' => '', 'statusReadonly', 'requiredTrue' => true, 'name' => ''])


@php

    $hasCustomClass = $attributes->get('class') !== null;

    // Определение классов по умолчанию.
    $defaultClasses = 'form-control';

    // Если пользовательский класс передан, используем его, иначе - классы по умолчанию.
    $classAttribute = $hasCustomClass ? $attributes->get('class') : $defaultClasses;

@endphp


<input

    name="{{ $name }}"
    @if($requiredTrue) required @endif

    {{ $statusReadonly }}

{{ $attributes->class([

    $classAttribute,

])->merge([

    'type' => 'text',

    //Возврат старых введёных данных
    'value' => ($value ? $value : old($name)),

])  }} {{ $autofocus ? 'autofocus' : '' }} >
