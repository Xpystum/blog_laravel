@extends('templates.main')

@section('title.page', 'Создать Пост')

@section('main.content')

    <x-title>

        <h1 class="h2 mb-3">

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
                {{ __('Информация поста') }}
            </x-label>

            <textarea
                class="form-control"
                aria-label="With textarea"
                rows="3"
                name="info_post"
                value="{{ $post->post_info ?? '' }}"
            ></textarea>
            {{-- <x-input type="text" name="post_info" value="{{ $post->post_info ?? '' }}" autofocus /> --}}
            <x-error name='info_post'/>


        </x-form-item>

        <x-form-item>

            <x-label required>
                {{ __('Фотография Поста') }}
            </x-label>

            <x-error name='imgMain' />
            <x-input name="imgMain" type='file'/>

        </x-form-item>

        <x-form-item>

            <x-error name='imgAlt' />
            <x-input
                class="form-control"
                name="imgAlt"
                type='text'
                minlength="8"
                maxlength="200"
                placeholder="Введите описание картинки"
            />

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


