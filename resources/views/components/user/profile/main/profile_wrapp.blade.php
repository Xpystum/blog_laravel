@extends('templates.auth')

@section('title.page', 'Главная страница пользователя')


@section('auth.content')

<div class="flex justify-end">
    {{ $slot }}
</div>


@endsection
