@extends('templates.main')


@section('main.content')

    <x-title>

        <h1 class="h2 mb-5">

            {{ __('Список постов') }}

        </h1>

    </x-title>


    @include('blog.filter')


    @if($posts->isEmpty())

        {{ __('Нет ни одного поста') }}

    @else



        @foreach ($posts as $post)

        <article class="row">

            <div class="col-12">

                <x-post.card :post="$post" />

            </div>

        </article>

        @endforeach




        {{ $posts->links() }}

    @endif




@endsection

