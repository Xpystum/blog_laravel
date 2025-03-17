<div class="w-full flex flex-row">
    {{-- <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Открыть меню профиля</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button> --}}

    <x-user.navigation.sidebar-menu />

    <div class="flex flex-col ml-2 p-5 mb-4 rounded bg-gray-50 dark:bg-gray-800 w-full">

        <div class="w-full">

            <div class="flex justify-between items-center w-full">

                <div class="flex flex-col w-1/3">

                    <h1 class="text-white h1 font-bold mb-2">Основная информация профиля</h1>

                    <div class="flex w-1/2">
                        <img class="w-32 h-auto object-cover rounded-full" src="{{ asset(Auth::user()->url_avatar) }}"
                            alt="Фото пользователя">
                        {{-- <img class="w-full h-auto object-cover" src={{ asset(Auth::user()->url_avatar) }} alt="Фото пользователя"> --}}
                        <div class="flex flex-col justify-center ml-2">
                            <x-user.type.type-div class="mt-2">Разработчик</x-user.type.type-div>
                            <div class="mt-2">
                                <span
                                    class="block text-lg text-gray-900 dark:text-white font-medium">{{ Auth::user()->login }}</span>
                            </div>
                            <div class="flex mt-2 flex flex">
                                {{-- <x-svg.telegram />
                                <x-svg.github />
                                <x-svg.behance />
                                <x-svg.dprofile /> --}}
                                {{-- <x-svg.mysite />
                                <x-svg.developer.php />
                                <x-svg.developer.typescript />
                                <x-svg.developer.javascript />
                                <x-svg.developer.react />
                                <x-svg.developer.next-js /> --}}
                                <x-svg.laravel />
                                <x-svg.docker />
                                <x-svg.linux />
                                <x-svg.postgres />
                                <x-svg.sql />
                            </div>
                        </div>
                    </div>

                    <button data-modal-target="crud-modal-profile" data-modal-toggle="crud-modal-profile" type="button"
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

                    <h2 class="flex mb-4 items-center justify-center text-white text-center tex h2 font-bold mx-2">
                        Статистика блога</h2>

                    <div class="flex">

                        <div
                            class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md">

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

        <div class="">

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


                <div class="flex flex-col hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile"
                    role="tabpanel" aria-labelledby="profile-tab">

                    <livewire:profile-info-user-component />

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

        <div class="-mx-3 border-b border-gray-500 opacity-50 mt-8 mb-2"></div>

        <button type="button"
            class="mt-2 w-[140px] text-white bg-blue-700
            hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
            font-medium rounded-lg text-sm px-5 py-1.5
            dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none
            dark:focus:ring-blue-800">
            Редактировать
        </button>
        {{-- Блок профиля и редактирование аватарки --}}
    </div>


    <!-- Main modal -->
    <div id="crud-modal-profile" tabindex="-1" aria-hidden="true" {{-- hidden --}}
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="bg-[#1f2937] flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Обновление информации
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5 bg-[#1f2937]">
                    <div>
                        <h4 class="text-sm h5 text-white text-bold font-semibold text-gray-900 dark:text-white mb-2">
                            Загрузка Аватара</h4>
                        <div class="flex flex-row">
                            <img class="aspect-square object-cover w-20 h-20 md:w-12 md:h-12 p-0.5 rounded-full ring-1 ring-gray-300 dark:ring-gray-500"
                                src={{ asset(Auth::user()->url_avatar) }} alt="Фото пользователя">
                            <div class="flex flex-col flex-1 ml-2">
                                <div>
                                    <x-input.input-file name="profile_avatar" value_text='' class="w-full" />
                                    <p class="text-gray-400 text-xs my-1 ">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                </div>

                                <div class="">
                                    <button type="button"
                                        class="mt-2 w-[140px] text-white bg-blue-700
                                            hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                                            font-medium rounded-lg text-sm px-5 py-1.5
                                            dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none
                                            dark:focus:ring-blue-800">
                                        Загрузить
                                    </button>

                                    <button type="button"
                                        class="py-1.5 px-2 me-2 mb-2 ml-1 text-sm font-medium
                                        text-gray-900 focus:outline-none bg-white rounded-lg border
                                        border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4
                                        focus:ring-gray-100 dark:focus:ring-gray-700
                                        dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600
                                        dark:hover:text-white dark:hover:bg-gray-700">
                                        Очистить
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col w-1/2">
                                <x-union.form.union-label-input
                                    default_class_label="text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                    placeholder="Полное имя" name="full_name" type="text"
                                    label="{{ __('Полное имя') }}" />
                                <x-union.form.union-label-input
                                    default_class_label="text-sm w-full block mb-2 mt-2 font-medium text-gray-900 dark:text-white"
                                    placeholder="Ваша почта" name="email" type="email" label="Email"
                                    statusReadonly="readonly"
                                />
                            </div>
                            <div class="flex flex-col w-1/2 ml-3">

                                <div class="flex flex-col">
                                    <x-label for="typeSelectActivities"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        {{ __('Сфера деятельности') }}
                                    </x-label>

                                    <x-select id="typeSelectActivities" placeholder="Кто вы?" name="type"
                                        :options="[
                                            'Разработчик' => 'Разработчик',
                                            'Дизайнер' => 'Дизайнер',
                                            'Другое' => 'Другое',
                                        ]"
                                        class="placeholder-gray-400     h-[42px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full
                                            p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>

                                <div class="flex flex-col">

                                    <x-label for="typeSelectActivities"
                                        class="text-sm w-full block mb-2 mt-2 font-medium text-gray-900 dark:text-white">
                                        {{ __('Ваши контакты') }}
                                    </x-label>

                                    <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover"
                                        class="flex flex-row justify-between h-[42px] text-gray-400
                                        focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500
                                        border-gray-300 dark:border-gray-600 block
                                        font-medium text-sm rounded-lg text-sm px-2.5 py-2.5 text-center inline-flex border
                                        items-center text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        type="button">Укажите контакты
                                    <svg class="w-2.5 h-2.5 ms-3"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div id="dropdownBgHover"
                                        class="z-10 bg-gray-500 border dark:border-gray-400 hidden w-96 bg-white rounded-lg shadow-sm dark:bg-gray-700 ">
                                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownBgHoverButton">
                                            <li>
                                                <x-union.form.union-label-input
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку Telegam') }}" name="full_name" type="text"
                                                    label="false">
                                                    <x-svg.telegram class="mr-2 pointer-events-none cursor-default"/>
                                                </x-union.form.union-label-input>

                                            </li >

                                            <li>
                                                <x-union.form.union-label-input
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на Behance') }}" name="full_name" type="text"
                                                    label="false">
                                                    <x-svg.behance class="mr-2 pointer-events-none cursor-default"/>
                                                </x-union.form.union-label-input>
                                            </li>

                                            <li>
                                                <x-union.form.union-label-input
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на Vk') }}" name="full_name" type="text"
                                                    label="false">
                                                    <x-svg.vkontakte class="mr-2 pointer-events-none cursor-default"/>
                                                </x-union.form.union-label-input>
                                            </li>

                                            <li>
                                                <x-union.form.union-label-input
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на Github') }}" name="full_name" type="text"
                                                    label="false">
                                                    <x-svg.github class="mr-2 pointer-events-none cursor-default"/>
                                                </x-union.form.union-label-input>
                                            </li>

                                            <li>
                                                <x-union.form.union-label-input
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на linkedin') }}" name="full_name" type="text"
                                                    label="false">
                                                    <x-svg.linkedin class="mr-2 pointer-events-none cursor-default"/>
                                                </x-union.form.union-label-input>
                                            </li>

                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="w-full mt-2">
                            <x-union.form.union-label-input placeholder="{{ __('Укажите ссылки через Enter') }}"
                                name="my_project_tagify" type="text" label="{{ __('Мои проекты') }}"
                                default_class_label="text-sm w-full block mb-2 mt-2 font-medium text-gray-900 dark:text-white" />
                        </div>

                        <div class="flex mt-2 flex-row">
                            <div class="w-1/2">
                                <x-union.form.union-label-input placeholder="••••••••" name="my_project_tagify"
                                    type="password" label="{{ __('Новый пароль') }}"
                                    default_class_label="text-sm w-full block mb-2 mt-2 font-medium text-gray-900 dark:text-white" />
                            </div>
                            <div class="ml-3 w-1/2">
                                <x-union.form.union-label-input placeholder="••••••••" name="my_project_tagify"
                                    type="password" label="{{ __('Повторите пароль') }}"
                                    default_class_label="text-sm w-full block mb-2 mt-2 font-medium text-gray-900 dark:text-white" />
                            </div>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>


</div>
