@extends('templates.auth')

@section('title.page', 'Страница Создание Поста')

@section('auth.content')

    <x-form class="w-auto mx-auto" enctype="multipart/form-data" method="POST" action=" {{ route('user.posts.store') }} ">

        <input value="{{ old('content', $post->content ?? 'null') }}" class="hidden" name="content" id="hiddenContent_input_tiptap">
        @include('includes.text-editor.text-editor_includes')

    </x-form>

    @pushOnce('scripts')
        {{-- @vite('resources/js/tiptap/tiptap.js') --}}
        @vite('resources/js/tiptap/save-storage-input-tiptap.js')  {{-- Логика сохранения контента из редактора в контейнер  local storage --}}
        @vite('resources/js/tiptap/button-deleted-content.js')  {{--  --}}
    @endPushOnce
@endsection
