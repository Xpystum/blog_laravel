@extends('templates.auth')

@section('title.page', 'Профиль пользователя')

@section('auth.content')

    @include('includes.user.profile.preview-profile', [
        'profile' => $profile,
        'user' => $profile->user,
        'posts' => $posts,
        'totalLikes' => $totalLikes,
        'totalViews' => $totalViews,
        'totalPosts' => $totalPosts,
    ])

    @pushOnce('livewire-js')
        @livewireScripts
    @endPushOnce

    @pushOnce('livewire-css')
        @livewireStyles
    @endPushOnce

    @pushOnce('scripts')
        @vite('resources/js/sliderProgress/sliderProgress.js')
        @vite('resources/js/tagify/tagify.js')
    @endPushOnce


@endsection
