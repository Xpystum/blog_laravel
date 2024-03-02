@props(['name' => '', 'value' => ''])


@php
    $valueText = old($name)  ?: $value
@endphp
<div>
    <input id="{{ $name }}" type='hidden' name='content' value="{{ $valueText }}">

    <trix-editor class="trix-editor" row="10" input="{{ $name }}" ></trix-editor>
    <x-error name="{{$name}}" />
</div>


@once('trix')
    @trixassets
@endonce