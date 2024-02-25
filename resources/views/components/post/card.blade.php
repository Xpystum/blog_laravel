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
            {{ now()->format('d.m.y h:i:s') }}
        </div>

        <p>

            {!! $post->content !!}
            
        </p>

    </x-card-body>
</x-card>
