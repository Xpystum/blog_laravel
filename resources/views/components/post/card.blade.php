@props(['post' => null])

<div class="flex h-[500px] p-5 items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">

        <div class="flex flex-col justify-between h-full w-1/2 pr-3">


            <h2 class="text-xl text-white dark:text-white pb-3 overflow-hidden whitespace-nowrap text-ellipsis max-w-full">
                {{ $post->title }}
            </h2>

            <a href='{{ route('user.posts.view.update', $post->id) }}' class="leading-snug grid place-items-center h-full text-lg text-gray-400 dark:text-gray-500 mb-5 overflow-hidden text-ellipsis">
                {!! $post->content_cover !!}
            </a>


            <span class="mb-2 block text-white dark:text-white text-sm">{{ now('Y') }}</span>
            <div class="flex flex-row justify-between">
                <div class="flex flex-row">
                    <img class="w-10 h-10 md:w-12 md:h-12 p-0.5 rounded-full ring-1 ring-gray-300 dark:ring-gray-500" src={{ asset(Auth::user()->url_avatar) }} alt="Фото пользователя" />
                    <span class="flex items-center text-white dark:text-white justify-center text-center pl-2 w-full">Евгения Красова</span>
                </div>

                <div class="flex flex-row">
                    <a href="#" class="p-1 ml-2">
                        <x-icon-heart class="svg-icon-heart"/>
                    </a>
                    <a href="#" class="p-1 ml-2">
                        <x-icon-message class="svg-icon-message" />
                    </a>

                    <a href="#" class="p-1 ml-2">
                        <x-icon-observ class="svg-icon-observ"/>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-1/2 h-full">
            <img
                src={{ Storage::disk('post_image_cover')->url($post?->cover_img->path_url) }}
                alt="Картинка"
                class="w-full h-full object-cover rounded-lg"
                onerror="this.onerror=null; this.src='{{ asset('/storage/img/chilling_code.jpg') }}'  ;"
            />
        </div>
    </div>
</div>
