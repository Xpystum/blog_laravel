@extends('templates.auth')

@section('title.page', 'Страница Создание Поста')

@section('auth.content')

    @include('includes.user.profile.preview-profile')

    @pushOnce('scripts')
        @vite('resources/js/tagify/tagify.js')
    @endPushOnce

    @pushOnce('livewire-js')
        @livewireScripts
    @endPushOnce

    @pushOnce('livewire-css')
        @livewireStyles
    @endPushOnce


@endsection
