@props([])

<div class="flex h-[500px] items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
    <div class="flex flex-row justify-between p-5 h-full w-full">

        <div class="flex flex-col justify-between h-full w-1/2 pr-3">
            <h2 class="line-clamp-3 text-xl text-white dark:text-white mb-2 overflow-hidden text-ellipsis">Lorem ipsum dolor,  sit amet consectetur adipisicing elit. Temporibus, odio. Commodi enim sequi voluptatem repellat.</h2>

            <p class="leading-snug grid place-items-center h-full text-lg text-gray-400 dark:text-gray-500 mb-5 overflow-hidden text-ellipsis">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tenetur repellat odio dolor reprehenderit facilis aperiam officiis vero repellendus dignissimos doloremque a ad explicabo, sequi voluptatum. Excepturi nostrum, laborum eaque error saepe provident, autem suscipit, quisquam possimus corporis perferendis perspiciatis deserunt! Praesentium nam non minus saepe consequuntur dolor quidem! Unde incidunt fugiat sunt hic vel ex voluptas, earum quasi nulla quis, enim magni a exercitationem magnam. Ad sequi nulla fugiat cum fuga distinctio omnis sed quas reiciendis repellendus? Laboriosam nobis necessitatibus eaque accusamus mollitia voluptatum consectetur architecto veniam numquam iure expedita asperiores facere accusantium dolores, animi a sapiente dicta aut.
            </p>

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
            src="https://png.pngtree.com/thumb_back/fw800/background/20230610/pngtree-picture-of-a-blue-bird-on-a-black-background-image_2937385.jpg"
            alt="Картинка"
            class="w-full h-full object-cover rounded-lg"
            />
        </div>
    </div>
</div>
