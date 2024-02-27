@props(['post' => null ])

<x-form {{ $attributes }}>

    <x-form-item>

        <x-label required>
            {{ __('Название поста') }}
        </x-label>

        <x-input name="title" value="{{ $post->title ?? '' }}" autofocus />

    </x-form-item>

    <x-form-item>

        <x-label required>
            {{ __('Содержание поста') }}
        </x-label>

        {{-- <x-textarea name="content" rows="10" /> --}}
        <x-trix value="{{ $post->title ?? '' }}" name='content'></x-trix>

    </x-form-item>
    
    {{ $slot }}
</x-form>



