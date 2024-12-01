@extends('templates.main')

@section('title.page', 'Страница Входа')


@section('auth.content')
    <x-card class="card sm:rounded-lg">

        <x-form class="w-auto mx-auto" action="{{ route('login.store') }}" method="POST">

            @include('includes.auth.login.login_form')

        </x-form>

    </x-card>
@endsection
