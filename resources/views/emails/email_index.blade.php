@extends('templates.auth')

@section('title.page', 'Страница Входа')


@section('auth.content')
    <x-card class="card sm:rounded-lg">

        <x-form class="w-1/2 mx-auto" action="{{ route('login.store') }}" method="POST">

            @include('includes.auth.login.login_form')

        </x-form>

    </x-card>
@endsection
