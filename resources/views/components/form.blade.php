@props(['method' => 'GET', 'enctype' => null, 'method_other' => false])

@php
    $method = strtoupper($method);
    $_method = in_array($method , ['GET' , 'POST']);
@endphp

<form {{ $attributes }}

    @isset($enctype)
        enctype="{{ $enctype }}"
    @endisset

    method="{{  $_method ? $method : "POST"  }}">

    @if($method_other)
        @method($method_other)
    @endunless



    @if($method !== 'GET')

        @csrf

    @endif

    {{ $slot }}

</form>






