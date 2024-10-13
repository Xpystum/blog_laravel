@extends('templates.main')

@section('title.page', 'Мои посты')


@section('main.content')

    <x-title>
        <h1 class="h2">
            {{ __('Мои Посты') }}
        </h1>

        <x-slot name="right">

            <x-button-link href=" {{route('user.posts.create')}}" >

                {{ __('Создать') }}

            </x-button-link>

        </x-slot>
    </x-title>


    @if(empty($posts))

        {{ __('Нет ни одного поста') }}

    @else

        @foreach ($posts as $post)

            <x-card padding='p-2'>
                <x-card-body>
                    <div class="mb-3">

                        <a href="{{ route('user.posts.show', $post->id) }}">
                            <h2 class="h6 m-0">
                                {{ $post->title }}
                            </h2>
                        </a>

                        <div class="small text-muted mb-0 mt-0">

                            {{ $post->published_at?->format('d.m.Y H:i:s') }}

                        </div>

                    </div>
                </x-card-body>
            </x-card>

        @endforeach

        {{ $posts->links() }}

    @endif




@endsection
