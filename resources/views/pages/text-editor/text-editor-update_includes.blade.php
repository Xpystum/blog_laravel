@extends('templates.auth')

@section('title.page', 'Страница Обновления Поста')

@section('auth.content')

    <x-form class="w-auto mx-auto" enctype="multipart/form-data" method="PATCH" action=" {{ route('user.posts.update', $post->id) }} ">

        <input value="{{ old('content', $post->content ?? 'null') }}" class="hidden" name="content" id="hiddenContent_input_tiptap">
        @include('includes.text-editor.text-editor_includes', ['post' => $post])

    </x-form>

    @pushOnce('scripts')
        @vite('resources/js/tiptap/tiptap.js')
    @endPushOnce
@endsection
