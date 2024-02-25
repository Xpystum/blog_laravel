@extends('templates.main')


@section('main.content')

    <x-title>

        <h1 class="h2 mb-5">

            {{ __('Список постов') }}

        </h1>

    </x-title>


    @if(empty($posts))

        {{ __('Нет ни одного поста') }}

    @else

    <div class="row">

        @foreach ($posts as $post)

        <div class="col-4">

            <x-post.card :post="$post" />

        </div>

        @endforeach

    </div>
        
    @endif
    

    
  
@endsection
