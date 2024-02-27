@props(['name' => '', 'value' => ''])
<input id="{{ $name }}" type='hidden' name='content' value="{{ $value }}">

<trix-editor class="trix-editor" row="10" input="{{ $name }}" ></trix-editor>

@once('trix')
    @trixassets
@endonce