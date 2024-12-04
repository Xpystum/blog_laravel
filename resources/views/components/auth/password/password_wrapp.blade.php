@extends('templates.main')

@section('title.page', 'Страница восстановления пароля')

@section('main.content')


    <x-form class="w-auto mx-auto" action="{{ route('password.store') }}" method="POST">

        {{ $slot }}

    </x-form>


@endsection
