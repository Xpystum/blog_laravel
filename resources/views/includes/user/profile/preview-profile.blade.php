<div class="w-full flex flex-row">
  <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Открыть меню профиля</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <x-user.navigation.sidebar-menu />

    <div class="flex h-[500px] ml-2 p-5 mb-4 rounded bg-gray-50 dark:bg-gray-800 w-full h-85vh">

        <div class="w-full">
            {{-- <h2>Информация пользователя</h2> --}}
            <div class="flex justify-between items-center w-full">

                <div class="flex">
                    <img class="w-28 h-28" src={{ asset(Auth::user()->url_avatar) }} alt="Фото пользователя">
                    <div class="flex flex-col justify-center ml-2">
                        <x-user.type.type-div class="mt-2">Разработчик</x-user.type.type-div>
                        <div class="mt-2">
                            <span class="block text-lg text-gray-900 dark:text-white font-medium">{{ Auth::user()->login }}</span>
                        </div>
                        <div class="flex mt-2 flex flex">
                            <x-svg.telegram />
                            <x-svg.github/>
                            <x-svg.vkontakte />
                            <x-svg.behance />
                            <x-svg.dprofile />
                            <x-svg.mysite />
                            <x-svg.instagram />
                            <x-svg.linkedin />
                            <x-svg.html />
                            <x-svg.figma />
                            <x-svg.adobexd />
                            <x-svg.adobephotoshop />
                            <x-svg.adobeillustrator />
                            <x-svg.sketch />
                            <x-svg.adobeafteraffects />
                        </div>
                    </div>
                </div>


                <div class="flex">

                    <div class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md">

                        <div class="flex flex-col flex-nowrap justify-center p-1.5 relative w-full">
                            <span class="text-lg font-bold text-white">100</span>
                            <span class="text-lg text-gray-400">Просмотр статей</span>
                            <div class="absolute top-1 right-1">
                                <x-icon-observ class="svg-icon-observ icon-blade-disable-hover "/>
                            </div>
                        </div>

                    </div>

                    <div class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md ml-3">

                        <div class="flex flex-col flex-nowrap justify-center p-1.5 relative w-full">
                            <span class="text-lg font-bold text-white">500</span>
                            <span class="text-lg text-gray-400">Лайков</span>

                            <div class="absolute top-1 right-1">
                                <livewire:post-like-component :post="null" :collection="null" :disableHeartButton="true"/>
                            </div>
                        </div>

                    </div>

                    <div class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md ml-3">

                        <div class="flex flex-col flex-nowrap justify-center p-1.5 relative w-full">
                            <span class="text-lg font-bold text-white">50</span>
                            <span class="text-lg text-gray-400">Статей</span>

                            <div class="absolute top-1 right-1">
                                <x-icon-message class="svg-icon-message icon-blade-disable-hover "/>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            {{-- Блок профиля и редактирование аватарки --}}
        </div>

    </div>

</div>
