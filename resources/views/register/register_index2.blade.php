@extends('templates.auth')

@section('title.page', 'Страница Регистрации')

@section('auth.content')
    <x-card class="card shadow sm:rounded-lg">

        <x-card-body>

            <x-errors />

            <x-form action="{{ route('register.store') }}" method="POST">

               @include('includes.register.register_form')

            </x-form>

            @include('includes.social.social')

        </x-card-body>

    </x-card>
@endsection
