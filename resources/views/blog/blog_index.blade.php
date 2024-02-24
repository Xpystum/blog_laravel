@extends('templates.base')


@section('content')

    <section>
        <x-container>

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

                <div class="col-12">

                   <x-card
                   >
                        <x-card-body> 

                            <div class="mb-4">

                                <h5>
            
                                    <a href=" {{ route('blog.show' , $post->id) }} ">
            
                                        {{ $post->title }}
                    
                                    </a>
            
                                </h5>
                            
                            </div>
            
                            <p>
            
                                {!! $post->content !!}
                                
                            </p>

                        </x-card-body>
                        
                   </x-card>

                </div>

                @endforeach

               </div>
                
            @endif

        </x-container>
    </section>
    

    
  
@endsection
