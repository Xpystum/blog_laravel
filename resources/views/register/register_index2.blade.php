@extends('templates.auth')

@section('title.page', 'Страница Регистрации')

@section('auth.content')
    <x-card class="card sm:rounded-lg">

        <x-form class="w-1/2 mx-auto" action="{{ route('register.store') }}" method="POST">

            @include('includes.register.register_form')

        </x-form>

    </x-card>
@endsection
