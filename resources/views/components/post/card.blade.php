<x-card @class(["mb-5 border"]) padding="p-0">
    <x-card-body>
        {{-- justify-content-between --}}
        <div class="d-flex flex-row">

            <div class="post-wrapp_left">

                <i class="fa-solid fa-6x fa-arrow-up "></i>
                <div class="wrapp-icon"></div>

                <a href="#">
                    <div class="post-wrapp__background_black"></div>
                    <img class="post-img_left" src="{{ asset("storage/" . $post->img->pathImg) }}" />
                </a>
            </div>



            <div class="d-flex flex-column justify-content-center align-items-center mw-65 overflow-hidden">
                <header class="card-title w-75 text-left mb-3 mt-3">

                    <h1 class="h4">

                        <a class="link-no-underline font-weight-bold" href=" {{ route('blog.show' , $post->id) }} ">

                            {{ $post->title }}

                        </a>

                    </h1>

                </header>

                <p class="w-75 mb-2 font-weight-normal text-wrap overflow-hidden">
                    {{ $post->info_post }}
                </p>

                <div class="d-flex flex-row align-items-center w-75 text-muted small">

                    <span class class="small">
                        {{ __('Статья №')}} {{ $post->id }}
                    </span>

                    <div class="small ms-2">
                        {{ $post->published_at?->diffForHumans() }}
                    </div>
                </div>



            </div>

        </div>


    </x-card-body>
</x-card>
{{--
<div class="card mb-3" >
    <div class="row g-0">
      <div class="col-md-4">
        <a href="#">
            <img src="{{asset("storage/" . $post->img->pathImg)}}" class="img-fluid rounded-start" alt="...">
        </a>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wiThis is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.der card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
</div> --}}

@once
    @push('header')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    @endpush
@endonce

