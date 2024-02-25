@extends('templates.main')

@section('title.page', 'Просмотр Поста')


@section('main.content')

    <x-title>

        {{ __('Просмотр Поста') }}

        <x-slot name="link">

            <a href=" {{  route('user.posts') }} ">

                {{ __('Назад') }}

            </a>
      

        </x-slot>

        <x-slot name="right">

            <x-button-link href=" {{  route('user.posts.edit', $post->id) }} ">

                {{ __('Изменить') }}

            </x-button-link>
      

        </x-slot>

    </x-title>


    <a href="{{ route('user.posts.show', $post->id) }}"> 
        <h2 class="h4 m-0">
            {{ $post->title }}
        </h2>
    </a>    

    <div class="small text-muted mb-0 mt-0 pt-1">

        {{ now()->format('d.m.y h.s.m') }}

    </div>

    <div class="pt-3">
        <p>
            {!! $post->content !!}
        </p>
    </div>
    

    
  
@endsection
