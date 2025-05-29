@extends('templates.auth')

@section('title.page', 'Страница личных сообщений.')

@section('auth.content')

    @include('includes.user.message.message')

@endsection
