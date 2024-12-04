@extends('templates.auth')

@section('title.page', 'Страница Регистрации')

@section('auth.content')
    <x-card class="card sm:rounded-lg">

        <x-form class="w-auto mx-auto" action="{{ route('register.store') }}" method="POST">

            {{ $slot }}

        </x-form>

    </x-card>
@endsection
