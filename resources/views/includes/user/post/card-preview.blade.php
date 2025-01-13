<div>
    <div class="flex flex-col w-full h-full">
        <div>
            <x-user.card.card-user  src="{{ asset(Auth::user()->url_avatar) }}" span_name="{{ Auth::user()->login }}" >
                <span class="mb-2 block text-white dark:text-white text-sm">{{ $post->created_at->translatedFormat('d F, H:i') }}</span>
            </x-user.card.card-user>
            <h1 class="h1">{{ $post->title }}</h1>
        </div>
        <div class="max-w-lg text-3xl font-semibold leading-loose text-gray-900 dark:text-white">
            {!! $post->content !!}
        </div>
    </div>
</div>
