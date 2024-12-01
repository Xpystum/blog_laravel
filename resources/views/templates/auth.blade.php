@extends('templates.base')


@section('content')

    <section class="w-full">

        <x-container>

            <div class="w-full md:mx-auto">

                @yield('auth.content')

            </div>

        </x-container>

    </section>

@endsection
