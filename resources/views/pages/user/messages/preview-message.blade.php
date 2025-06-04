@extends('templates.auth')

@section('title.page', 'Страница личных сообщений.')

@section('auth.content')


    @include('includes.user.message.message', [ 'messages' => $messages, 'userAuth' => $userAuth, 'userOther' => $userOther, 'chatPersonalId' => $chatPersonalId])

    @pushOnce('livewire-js')
        @livewireScripts
    @endPushOnce

    @pushOnce('livewire-css')
        @livewireStyles
    @endPushOnce

@endsection
