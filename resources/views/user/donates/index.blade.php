@extends('templates.main')

@section('title.page', 'Мои донаты')


@section('main.content')


    <x-title>

        <h1 class="h2 mb-5">

            {{ __('Мои Посты') }}

        </h1>

    </x-title>
   
    {{-- @include('user.donates.filter') --}}

    @include('includes.donates.stats')

    {{-- @include('user.donates.table') --}}

    
  
@endsection
