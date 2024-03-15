@props(['padding' => 'p-3'])

<div {{ $attributes->merge([
    'class' => 'mb-4 border',
])->class([
    $padding,
])}}>

    {{ $slot }}

</div>