@extends('templates.main')

@section('title.page', 'Создать Пост')


@section('main.content')

    <x-title>

        <h1 class="h2 mb-5">

            {{ __('Создать Пост') }}

        </h1>

        <x-slot name="link">

            <a href="{{ route('user.posts') }}">
                {{ __('Назад') }}
            </a>

        </x-slot>

        
    </x-title>

    <x-post.form action="{{ route('user.posts.store') }}" method="POST"/>

@endsection

