@extends('templates.auth')

@section('title.page', 'Главная страница пользователя')


@section('auth.content')

    <div class="w-full flex flex-row">
        {{ $slot }}
    </div>

   {{-- Если мы хотим юзать livewire для определённых шаблонов --}}
    @pushOnce('livewire-js')
        @livewireScripts
    @endPushOnce

    @pushOnce('livewire-css')
        @livewireStyles
    @endPushOnce

@endsection
