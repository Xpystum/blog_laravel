@props(['color' => 'primary', 'size' => ''])

    <a {{ $attributes->class([

        "btn btn-{$color}", ($size ? 'btn-{$size}' : '')

    ])
    ->merge([

        'type' => 'button',
        'href' => '#'

    ])  }}>

        {{ $slot }}

    </a>

   