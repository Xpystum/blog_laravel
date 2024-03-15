<x-card>
    <x-card-body> 

        <div class="mb-4">

            <h2 class="h6">

                <a href=" {{ route('blog.show' , $post->id) }} ">

                    {{ $post->title }}

                </a>

            </h2>
        
        </div>

        <div class="small text-muted">
            {{ $post->published_at?->diffForHumans() }}
        </div>

        <p>

            {!! $post->content !!}
            
        </p>


            {{ $post->id }}
            
    </x-card-body>
</x-card>
