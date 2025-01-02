<x-user.profile.main.profile_wrapp>
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <x-user.navigation.sidebar-menu />

    <div class="w-full pl-2">
        <div class="px-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

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

            <textarea id="editor"></textarea>


            <div class="flex h-[500px] items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <div class="flex flex-row justify-between p-3 h-full w-full">

                    <div class="flex flex-col justify-between h-full w-1/2 pr-3">
                        <h2 class="text-2xl pb-2">Ttile Lorem ipsum dolor sit amet.</h2>
                        <p class="h-full text-xl text-gray-400 dark:text-gray-500 pb-2">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet unde voluptas tenetur blanditiis enim quod expedita ipsa debitis rem ab!
                        </p>
                        <span class="pb-4 block">{{ now('Y') }}</span>
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-row">
                                <img class="w-10 h-10 md:w-12 md:h-12 p-0.5 rounded-full ring-1 ring-gray-300 dark:ring-gray-500" src={{ asset(Auth::user()->url_avatar) }} alt="Фото пользователя" />
                                <span class="flex items-center justify-center text-center pl-2 w-full">Евгения Красова</span>
                            </div>

                            <div class="flex flex-row">
                                <div class="pl-2">
                                    <i class="fa-solid fa-envelope-circle-check fa-fade fa-2xl" style="color: #057a55;"></i>
                                </div>
                                <div class="pl-2">
                                    <i class="fa-solid fa-envelope-circle-check fa-fade fa-2xl" style="color: #057a55;"></i>
                                </div>
                                <div class="pl-2">
                                    <i class="fa-solid fa-envelope-circle-check fa-fade fa-2xl" style="color: #057a55;"></i>
                                </div>

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

            <div class="flex h-[500px] items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <div class="flex flex-row justify-between p-3 h-full w-full">

                    <div class="flex flex-col justify-between h-full w-1/2 pr-3">
                        <h2 class="text-2xl pb-2">Ttile Lorem ipsum dolor sit amet.</h2>
                        <p class="h-full text-xl text-gray-400 dark:text-gray-500 pb-2">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet unde voluptas tenetur blanditiis enim quod expedita ipsa debitis rem ab!
                        </p>
                        <span class="pb-4 block">{{ now('Y') }}</span>
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-row">
                                <img class="w-10 h-10 md:w-12 md:h-12 p-0.5 rounded-full ring-1 ring-gray-300 dark:ring-gray-500" src={{ asset(Auth::user()->url_avatar) }} alt="Фото пользователя" />
                                <span class="flex items-center justify-center text-center pl-2 w-full">Евгения Красова</span>
                            </div>

                            <div class="flex flex-row">
                                <div class="pl-2">
                                    <i class="fa-solid fa-envelope-circle-check fa-fade fa-2xl" style="color: #057a55;"></i>
                                </div>
                                <div class="pl-2">
                                    <i class="fa-solid fa-envelope-circle-check fa-fade fa-2xl" style="color: #057a55;"></i>
                                </div>
                                <div class="pl-2">
                                    <i class="fa-solid fa-envelope-circle-check fa-fade fa-2xl" style="color: #057a55;"></i>
                                </div>

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


            {{-- <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    </p>
                </div>
            </div> --}}
        </div>
    </div>
</x-user.profile.main.profile_wrapp>
