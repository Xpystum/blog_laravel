@extends('templates.main')

@section('main.content')

    <div class="text-center">

        <h1>

            <figure class="w-full max-w-2xl relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" alt='mems rick'>
                    <img class="w-full max-w-2xl rounded-lg" src={{ asset('/storage/img/chilling_code.jpg') }} alt="my chilling code">
                </a>

                <figcaption class="w-full absolute px-4 text-lg text-white bottom-6">
                    <p>The code on this page is still chilling, do you want to chill too?</p>
                </figcaption>
            </figure>

        </h1>

</div>

@endsection
