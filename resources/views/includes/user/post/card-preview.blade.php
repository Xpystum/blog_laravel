<div>
    <div class="flex flex-col w-full h-full rounded bg-gray-50 dark:bg-gray-800 p-3">
        <div class="flex flex-col shadow border-b rounded-t dark:border-gray-600">
            <x-user.card.card-user class="flex justify-start"  src="{{ asset(Auth::user()->url_avatar) }}" span_name="{{ Auth::user()->login }}" alt="Аватар Пользователя">
                <span class="ml-2 flex items-center block text-gray-500 dark:text-gray-400">{{ $post->created_at->translatedFormat('d F, H:i') }}</span>
            </x-user.card.card-user>
            <h1 class="h1 mt-3 text-xl text-white dark:text-white mb-3 overflow-hidden max-w-full">
                <span>{{ $post->title }}</span>
            </h1>
        </div>

        <div class="px-4 py-2 h-[50vh] bg-white text-white rounded-b-lg dark:bg-gray-800 overflow-y-auto ">
            {!! $post->content !!}
        </div>

    </div>
</div>
