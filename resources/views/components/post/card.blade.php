@props(['post' => null])

@php
    //получаем значение url
    $path_img = $post?->cover_img?->path_url?? null;

    if($path_img && Storage::disk('post_image_cover')->exists($path_img)){
        //получаем полный путь вплоть до домена
        $path_img = Storage::disk('post_image_cover')->url($post?->cover_img?->path_url);
    } else {
        // устанавлвиаем null для нашего компонента blade <x-img>
        $path_img = null;
    }

@endphp


<div class="flex h-[500px] p-5 items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">

    <div class="flex flex-col justify-between h-full w-1/2 pr-3">

        <a href="{{ route('users.posts.view.preview', $post->id) }}"
            class="no-underline hover:underline hover:text-white">
            <h2
                class="text-xl text-white dark:text-white pb-3 overflow-hidden whitespace-nowrap text-ellipsis max-w-full">
                {{ $post->title }}
            </h2>
        </a>


        <a href="{{ route('users.posts.view.preview', $post->id) }}"
            class="leading-snug grid place-items-center h-full text-lg text-gray-400 dark:text-gray-500 mb-5 overflow-hidden text-ellipsis">
            {!! $post->content_cover !!}
        </a>


        <span
            class="mb-2 block text-white dark:text-white text-sm">{{ $post->created_at->translatedFormat('d F, H:i') }}</span>
        <div class="flex flex-row justify-between">

            <x-user.card.card-user src="{{ asset(Auth::user()->url_avatar) }}" span_name="{{ Auth::user()->login }}" />

            <div class="flex flex-row">
                <livewire:post-like-component :$post />

                <a href="{{ route('users.posts.view.preview', ['id' => $post->id, 'comment' => 'true']) }}" class="p-1 ml-2 button_card-preview-comment">
                    <x-icon-message class="svg-icon-message"/>
                </a>

                <a href="#" class="p-1 ml-2">
                    <x-icon-observ class="svg-icon-observ" />
                </a>
            </div>

        </div>
    </div>

    <div class="rounded-lg overflow-hidden w-1/2 h-full">
        <button data-modal-target="large-modal" data-modal-toggle="large-modal" class="w-full h-full" type="button">
            <x-img path_img="{{ $path_img }}" alt="Обложка Статьи" class="hover:scale-105 w-full h-full object-cover" />

            {{-- <img
                    src='{{ $path_img }}'
                    alt="Обложка Статьи"
                    class="hover:scale-105 w-full h-full object-cover"
                    onerror="this.onerror=null; this.src='{{ asset('/storage/img/chilling_code.jpg') }}'  ;"
                /> --}}
        </button>
    </div>

    <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">

    </div>

    {{-- START MODAL WINDOW --}}
    <div id="large-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 rounded-t ">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="large-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">

                    <x-img path_img="{{ $path_img }}" alt="Обложка Статьи" class="w-full h-full object-cover rounded-lg" />

                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="large-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    {{-- END MODAL WINDOW --}}

</div>
