@props(['name' => '', 'value' => ''])
<input id="{{ $name }}" type='hidden' name='content' value="{{ $value }}">

<trix-editor input="{{ $name }}" ></trix-editor>

@once('trix')

    @trixassets

@endonce