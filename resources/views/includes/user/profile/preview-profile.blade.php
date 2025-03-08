<div class="w-full flex flex-row">
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Открыть меню профиля</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <x-user.navigation.sidebar-menu />

    <div class="flex flex-col h-[500px] ml-2 p-5 mb-4 rounded bg-gray-50 dark:bg-gray-800 w-full h-85vh">

        <div class="w-full">
            {{-- <h2>Информация пользователя</h2> --}}
            <div class="flex justify-between items-center w-full">

                <div class="flex flex-col w-1/3">

                    <h1 class="text-white h1 font-bold mb-2">Основная информация профиля</h1>

                    <div class="flex w-1/2">
                        <img class="w-32 h-auto object-cover rounded-full" src="{{ asset(Auth::user()->url_avatar) }}" alt="Фото пользователя">
                        {{-- <img class="w-full h-auto object-cover" src={{ asset(Auth::user()->url_avatar) }} alt="Фото пользователя"> --}}
                        <div class="flex flex-col justify-center ml-2">
                            <x-user.type.type-div class="mt-2">Разработчик</x-user.type.type-div>
                            <div class="mt-2">
                                <span
                                    class="block text-lg text-gray-900 dark:text-white font-medium">{{ Auth::user()->login }}</span>
                            </div>
                            <div class="flex mt-2 flex flex">
                                <x-svg.telegram />
                                <x-svg.github />
                                <x-svg.behance />
                                <x-svg.dprofile />
                                <x-svg.mysite />
                            </div>
                        </div>
                    </div>

                    <button type="button"
                        class="mt-5 w-[140px] text-white bg-blue-700
                        hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                        font-medium rounded-lg text-sm px-5 py-1.5
                        dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none
                        dark:focus:ring-blue-800">
                        Редактировать
                    </button>



                </div>


                {{-- <div class="border-l border-gray-500 opacity-50 h-full mx-3 -my-4"></div> --}}

                <div class="h-48 border-l border-gray-500 opacity-50"></div>


                <div class="flex flex-col h-full">

                    <h2 class="flex mb-4 items-center justify-center text-white text-center tex h2 font-bold mx-2">Статистика блога</h2>

                    <div class="flex">

                        <div class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md">

                            <div class="flex flex-col flex-nowrap justify-center p-1.5 relative w-full">
                                <span class="text-lg font-bold text-white">100</span>
                                <span class="text-lg text-gray-400">Просмотр статей</span>
                                <div class="absolute top-1 right-1">
                                    <x-icon-observ class="svg-icon-observ icon-blade-disable-hover " />
                                </div>
                            </div>

                        </div>

                        <div
                            class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md ml-3">

                            <div class="flex flex-col flex-nowrap justify-center p-1.5 relative w-full">
                                <span class="text-lg font-bold text-white">500</span>
                                <span class="text-lg text-gray-400">Лайков</span>

                                <div class="absolute top-1 right-1">
                                    <livewire:post-like-component :post="null" :collection="null"
                                        :disableHeartButton="true" />
                                </div>
                            </div>

                        </div>

                        <div
                            class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md ml-3">

                            <div class="flex flex-col flex-nowrap justify-center p-1.5 relative w-full">
                                <span class="text-lg font-bold text-white">50</span>
                                <span class="text-lg text-gray-400">Статей</span>

                                <div class="absolute top-1 right-1">
                                    <x-icon-message class="svg-icon-message icon-blade-disable-hover " />
                                </div>
                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>


        <div class="-mx-3 border-b border-gray-500 opacity-50 mt-8 mb-2"></div>

        <div class="my-4">

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700 w-full">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                            data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Персональная информация</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Статьи</button>
                    </li>
                </ul>
            </div>

            <div id="default-tab-content">


                <div class="flex flex-col hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <h3 class="text-white h3 font-bold mb-2">Основная информация профиля</h3>

                    <div>
                        <div>

                        </div>
                        <div>

                        </div>
                    </div>

                    <div>
                        <div>

                        </div>
                        <div>

                        </div>
                        <div>

                        </div>
                    </div>


                </div>

                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                            content</strong>. Clicking another tab will toggle the visibility of this one for the
                        next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>

            </div>

        </div>



        {{-- Блок профиля и редактирование аватарки --}}
    </div>

</div>

</div>
