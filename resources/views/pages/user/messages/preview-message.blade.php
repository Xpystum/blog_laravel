@extends('templates.auth')

@section('title.page', 'Страница личных сообщений.')

@section('auth.content')

    @include('includes.user.message.message', [ 'messages' => $messages, 'userAuth' => $userAuth, 'userOther' => $userOther])

@endsection
