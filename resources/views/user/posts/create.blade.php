@extends('templates.main')

@section('title.page', 'Создать Пост')


@section('main.content')

    <x-title>

        <h1 class="h2 mb-4">

            {{ __('Создать Пост') }}

        </h1>

        <x-slot name="link">

            <a href="{{ route('user.posts') }}">
                {{ __('Назад') }}
            </a>

        </x-slot>

        
    </x-title>


    <x-form action="{{ route('user.posts.store') }}" method="POST" enctype="multipart/form-data">

        <x-form-item>

            <x-label required>
                {{ __('Название поста') }}
            </x-label>

            <x-input name="title" value="{{ $post->title ?? '' }}" autofocus />
            <x-error name='title' />
        

        </x-form-item>

        <x-form-item>

            <x-label required>
                {{ __('Фотография Поста') }}
            </x-label>

            <x-error name='imgMain' />
            <x-input name="imgMain" type='file'/>

        </x-form-item>

        <x-form-item>

            <x-label required>
                {{ __('Содержание поста') }}
            </x-label>

            <x-error name='content' />
            <x-quill name='content'></x-quill>

        </x-form-item>


        {{-- submitFormQuill - Для отправки текст редактора --}}
        <x-button onclick="submitFormQuill()">
            {{__('Создать пост')}} 
        </x-button>
        
    </x-form>

    

@endsection

