@extends('templates.main')

@section('title.page', 'Страница восстановления пароля')

@section('main.content')

    <x-form

        {{ $attributes }}
        method="POST"
    >

        {{ $slot }}

    </x-form>


@endsection
