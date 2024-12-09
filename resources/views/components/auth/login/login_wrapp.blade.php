@extends('templates.auth')

@section('title.page', 'Страница Входа')


@section('auth.content')

    <x-form class="w-auto mx-auto" action="{{ route('login.store') }}" method="POST">

        {{ $slot }}

    </x-form>

@endsection
