@extends('templates.main')

@section('title.page', 'Изменить Пост')


@section('main.content')

    <x-title>

        <h1 class="h2 mb-5">

            {{ __('Изменить пост') }}

        </h1>

        <x-slot name="link">

            <a href="{{ route('user.posts.show', $post->id) }}">

                {{ __('Назад') }}

            </a>

        </x-slot>

        
    </x-title>

    <x-post.form :post="$post" action="{{ route('user.posts.update', $post->id) }}" method="POST"/>

@endsection

