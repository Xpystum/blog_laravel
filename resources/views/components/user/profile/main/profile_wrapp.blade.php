@extends('templates.auth')

@section('title.page', 'Главная страница пользователя')


@section('auth.content')

    <div class="w-full flex flex-row mt-20">
        {{ $slot }}
    </div>

@endsection
