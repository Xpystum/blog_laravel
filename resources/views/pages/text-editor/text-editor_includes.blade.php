@extends('templates.auth')

@section('title.page', 'Страница Создание Поста')

@section('auth.content')

    <x-form class="w-auto mx-auto" method="POST">

        @include('includes.text-editor.text-editor_includes')

    </x-form>

    @once
        @vite('resources/js/tiptap.js')
    @endonce
@endsection
