@extends('templates.base')


@section('content')

    <div class="max-w-screen-xl">

        <x-container>

            <div class="w-full md:mx-auto">

                @yield('auth.content')

            </div>

        </x-container>

    </div>

@endsection
