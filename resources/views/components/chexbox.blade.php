@php($id = Str::uuid())

<div class="form-check">
    
    <x-input  type="checkbox"  {{ $attributes->merge([

        'value' => 1,

    ]) }}  
    class="form-check-input" id='{{ $id }}' />

    <x-label class="form-check-label" for="{{ $id }}">

        {{ $slot }}

    </x-label>

</div>