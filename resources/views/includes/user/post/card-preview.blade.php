@php

    $path_url_avatar = $post?->cover_img?->path_url ?? null;

    if(!is_null($path_url_avatar)) { $path_img = Storage::disk('post_image_cover')->url($post?->cover_img?->path_url); }
    else {
        $path_img = null;
    }


@endphp

<div>
    <div class="flex flex-col w-full h-full rounded bg-gray-50 dark:bg-gray-800 p-4">
        <div class="flex flex-col">

            <x-user.card.card-user class="flex justify-start"
                src="{{ asset($post->user->url_avatar) }}"
                span_name="{{ $post->user->login }}"
                alt="Аватар Пользователя {{ $post->user->login }}"
            >

                <span class="ml-2 flex items-center block text-gray-500 dark:text-gray-400">{{ $post->created_at->translatedFormat('d F, H:i') }}</span>
            </x-user.card.card-user>
            <h1 class="h1 mt-3 text-2xl text-white dark:text-white mb-3 overflow-hidden max-w-full">
                <span>{{ $post->title }}</span>
            </h1>

            <div class="-mx-3 border-b border-gray-500 opacity-50 mb-3"></div>



            <div class="flex flex-row justify-end">
                <div class="flex flex-row">

                    <livewire:post-like-component :$post :collection="$post->likes" />


                    <button type="button" class="p-1 ml-2 button_card-preview-comment">
                        <x-icon-message class="svg-icon-message"/>
                    </button>

                </div>
            </div>


            <x-img path_img="{{ $path_img }}" alt="Обложка Статьи" class="flex self-center h-1/2 w-1/2 mt-3 mb-3"/>

            <div class="p-3 bg-white text-gray-300 rounded-b-lg dark:bg-gray-800 overflow-y-auto">
                {!! $post->content !!}
            </div>

            <div class="-mx-3 border-b border-gray-500 opacity-50 mb-4"></div>

            <div class="flex flex-row items-center justify-between">
                <div class="flex flex-row">

                    <div class="flex flex-row">
                        <x-icon-observ class="svg-icon-observ icon-blade-disable-hover"/>
                        <span class="flex items-center ml-1 text-white">{{ $post->post_views_count }}</span>
                    </div>

                    <div class="flex flex-row ml-3">
                        <x-icon-heart class="svg-icon-heart icon-blade-disable-hover"/>
                        <span class="flex items-center ml-1 text-white">{{ $post->likes()->where('status', true)->count() }}</span>
                    </div>

                    <div class="flex flex-row ml-3 items-center">
                        <x-icon-message class="svg-icon-message icon-blade-disable-hover w-5 h-5"/>
                        <span class="flex items-center ml-1 text-white">{{ $post->comments->count() }}+</span>
                    </div>

                </div>

                <a href="{{ route('users.posts.view.update', $post->id) }}" class="{{ Auth::check() ? "" : 'pointer-events-none opacity-50' }} ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Редактировать</a>
            </div>

        </div>

    </div>
</div>
