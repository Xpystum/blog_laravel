@props(['method' => 'GET', 'enctype' => null])

@php
    $method = strtoupper($method);
    $_method = in_array($method , ['GET' , 'POST' ]);
@endphp

<form {{ $attributes }}

    @isset($enctype)
        enctype="{{ $enctype }}"
    @endisset

    method="{{  $_method ? $method : "POST"  }}">

    @unless($_method)

        @method($method)

    @endunless

    @if($method !== 'GET')

        @csrf

    @endif

    {{ $slot }}

</form>






