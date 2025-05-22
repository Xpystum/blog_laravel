@php

    $contacts = $profile->contacts;
    $checkSkills = $profile->checkSkills;

@endphp
<div class="w-full flex flex-row">

    <x-user.navigation.sidebar-menu />


    <div class="flex flex-col ml-2 p-5 mb-4 rounded bg-gray-50 dark:bg-gray-800 w-full lg:w-xl">
        <div class="w-full flex-1">

            <div class="flex justify-between items-center w-full">

                <div class="flex flex-col w-1/3">

                    <h1 class="text-white h1 font-bold mb-2 w-full">Основная информация профиля</h1>

                    <div class="flex flex-colum max-w-full">
                        <img class="w-32 h-auto object-cover rounded-full" src="{{ asset($profile->url_avatar) }}"
                            alt="Фото пользователя">
                    <div class="flex flex-col justify-center ml-2 max-w-full overflow-hidden">
                            <x-user.type.type-div class="mt-2">{{ $profile->type }}</x-user.type.type-div>
                            <div class="mt-2 max-w-full">
                                <span class="block w-full truncate text-lg text-gray-900 dark:text-white font-medium overflow-hidden">
                                  {{ $user->login }}
                                </span>
                            </div>
                            <div class="flex mt-2 flex-wrap max-w-full">
                                @foreach ($contacts as $value)
                                    <x-dynamic-component :href="$value->url" :component=" 'svg.' . $value->name" />
                                @endforeach
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


                <div class="h-48 border-l border-gray-500 opacity-50"></div>


                <div class="flex flex-col h-full">

                    <h2 class="flex mb-4 items-center justify-center text-white text-center tex h2 font-bold mx-2">
                        Статистика блога</h2>

                    <div class="flex">

                        <div class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md">

                            <div class="flex flex-col flex-nowrap justify-center p-1.5 relative w-full">
                                <span class="text-lg font-bold text-white">{{ $totalViews }}</span>
                                <span class="text-lg text-gray-400">Просмотр статей</span>
                                <div class="absolute top-1 right-1">
                                    <x-icon-observ class="svg-icon-observ icon-blade-disable-hover " />
                                </div>
                            </div>

                        </div>

                        <div
                            class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md ml-3">

                            <div class="flex flex-col flex-nowrap justify-center p-1.5 relative w-full">
                                <span class="text-lg font-bold text-white">{{ $totalLikes }}</span>
                                <span class="text-lg text-gray-400">Лайки</span>

                                  <div class="absolute top-1 right-1">

                                   <x-icon-heart  class="svg-icon-heart icon-blade-disable-hover" />

                                 
                                </div>
                            </div>

                        </div>

                        <div
                            class="flex border border-gray-500 max-w-[160px] min-w-[180px] bg-gray-50 dark:bg-gray-800 p-1 rounded-md ml-3">

                            <div class="flex flex-col flex-nowrap justify-center p-1.5 relative w-full">
                                <span class="text-lg font-bold text-white">{{ $totalPosts }}</span>
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

                    @livewire("profile-info-user-component", [
                        'checkSkills' => $checkSkills,
                        'profile' => $profile,
                    ])

                </div>

                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">

                    @livewire("profile-info-user-posts-component", [
                        'posts' => $posts,
                    ])

                </div>

            </div>

        </div>

        <div class="-mx-3 border-b border-gray-500 opacity-50 mt-8 mb-2"></div>

        <button data-modal-target="crud-modal-profile-additionally" data-modal-toggle="crud-modal-profile-additionally"
            type="button"
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
    <div id="crud-modal-profile" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">

                <div class="bg-[#1f2937] flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Обновление информации
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal-profile">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal profile body -->
                <x-form
                    class="p-4 md:p-5 bg-[#1f2937]"
                    action="{{ route('users.profiles.update.main') }}"
                    method="POST"
                    method_other="PATCH"
                    @submit.prevent="submitForm()"
                >



                    <div>
                        <h4 class="text-sm h5 text-white text-bold font-semibold text-gray-900 dark:text-white mb-2">
                            Загрузка Аватара</h4>
                        <div class="flex flex-row">
                            <img class="aspect-square object-cover w-20 h-20 md:w-12 md:h-12 p-0.5 rounded-full ring-1 ring-gray-300 dark:ring-gray-500"
                                src={{ asset($profile->url_avatar) }} alt="Фото пользователя">
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

                                    name="full_name"
                                    value="{{ $profile->full_name }}"
                                    :requiredTrue="false"
                                    default_class_label="text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                    placeholder="Полное имя"
                                    type="text"
                                    label="{{ __('Полное имя') }}"
                                />

                                <x-union.form.union-label-input
                                    value="{{ $user->email }}"
                                    name="email"
                                    :requiredTrue="false"
                                    default_class_label="text-sm w-full block mb-2 mt-2 font-medium text-gray-900 dark:text-white"
                                    placeholder="Ваша почта"
                                    type="email"
                                    label="Email"
                                    {{-- statusReadonly="readonly" --}}
                                />

                            </div>

                            <div class="flex flex-col w-1/2 ml-3">

                                <div class="flex flex-col">
                                    <x-label for="typeSelectActivities"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        {{ __('Сфера деятельности') }}
                                    </x-label>

                                    <x-select id="typeSelectActivities" placeholder="Кто вы?" name="type"
                                        value="{{ old('type') ? old('type') : $profile->type }}"
                                        :options="[
                                            'Разработчик' => 'Разработчик',
                                            'Дизайнер' => 'Дизайнер',
                                            'Другое' => 'Другое',
                                        ]"
                                        class="placeholder-gray-400 h-[42px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full
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
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
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

                                                <input name="contact[0][name]" value="telegram" class="hidden" />
                                                <x-union.form.union-label-input
                                                    name="contact[0][url]"
                                                    :requiredTrue="false"
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку Telegam') }}"
                                                    type="text" label="false"
                                                >

                                                <x-svg.telegram
                                                    data_tooltip_target="tooltip-svg-telegram-modal-profile"
                                                    class="mr-2 pointer-events-none cursor-default" />
                                                </x-union.form.union-label-input>

                                            </li>

                                            <li>
                                                <input name="contact[1][name]" value="behance" class="hidden" />
                                                <x-union.form.union-label-input
                                                    name="contact[1][url]"
                                                    :requiredTrue="false"
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на Behance') }}"
                                                     type="text" label="false">
                                                    <x-svg.behance
                                                        data_tooltip_target="tooltip-svg-behance-modal-profile"
                                                        class="mr-2 pointer-events-none cursor-default" />
                                                </x-union.form.union-label-input>
                                            </li>

                                            <li>
                                                <input name="contact[2][name]" value="dprofile" class="hidden" />
                                                <x-union.form.union-label-input
                                                    name="contact[2][url]"
                                                    :requiredTrue="false"
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на Dprofile') }}"
                                                     type="text" label="false">
                                                    <x-svg.dprofile
                                                        data_tooltip_target="tooltip-svg-dprofile-modal-profile"
                                                        class="mr-2 pointer-events-none cursor-default" />
                                                </x-union.form.union-label-input>
                                            </li>

                                            <li>
                                                <input name="contact[3][name]" value="vkontakte" class="hidden" />
                                                <x-union.form.union-label-input
                                                    name="contact[3][url]"
                                                    :requiredTrue="false"
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на Vk') }}"
                                                    type="text" label="false">
                                                    <x-svg.vkontakte
                                                        data_tooltip_target="tooltip-svg-vkontakte-modal-profile"
                                                        class="mr-2 pointer-events-none cursor-default" />
                                                </x-union.form.union-label-input>
                                            </li>

                                            <li>
                                                <input name="contact[4][name]" value="github" class="hidden" />
                                                <x-union.form.union-label-input
                                                    name="contact[4][url]"
                                                    :requiredTrue="false"
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на Github') }}"
                                                    type="text" label="false">
                                                    <x-svg.github
                                                        data_tooltip_target="tooltip-svg-github-modal-profile"
                                                        class="mr-2 pointer-events-none cursor-default" />
                                                </x-union.form.union-label-input>
                                            </li>

                                            <li>
                                                <input name="contact[5][name]" value="linkedin" class="hidden" />
                                                <x-union.form.union-label-input
                                                    name="contact[5][url]"
                                                    :requiredTrue="false"
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на linkedin') }}"
                                                    type="text" label="false">
                                                    <x-svg.linkedin
                                                        data_tooltip_target="tooltip-svg-linkedin-modal-profile"
                                                        class="mr-2 pointer-events-none cursor-default" />
                                                </x-union.form.union-label-input>
                                            </li>

                                            <li>
                                                <input name="contact[6][name]" value="instagram" class="hidden" />
                                                <x-union.form.union-label-input
                                                    name="contact[6][url]"
                                                    :requiredTrue="false"
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на Instagram') }}"
                                                    type="text" label="false">
                                                    <x-svg.instagram
                                                        data_tooltip_target="tooltip-svg-instagram-modal-profile"
                                                        class="mr-2 pointer-events-none cursor-default" />
                                                </x-union.form.union-label-input>
                                            </li>


                                            <li>
                                                <input name="contact[7][name]" value="mysite" class="hidden" />
                                                <x-union.form.union-label-input
                                                    name="contact[7][url]"
                                                    :requiredTrue="false"
                                                    default_class_input="h-[38px] max-h-[38px] flex flex-nowrap w-full  overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
                                                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    default_div_class="mb-2 flex flex-row justify-center align-content-center"
                                                    default_class_label="flex flex-row text-sm w-full block mb-2 font-medium text-gray-900 dark:text-white"
                                                    placeholder="{{ __('Укажите ссылку на ваш сайт') }}"
                                                    type="text" label="false">
                                                    <x-svg.mysite
                                                        data_tooltip_target="tooltip-svg-mysite-modal-profile"
                                                        class="mr-2 pointer-events-none cursor-default" />
                                                </x-union.form.union-label-input>
                                            </li>

                                        </ul>
                                    </div>
                                </div>


                            </div>

                        </div>


                        <div class="w-full mt-2">
                            <x-union.form.union-label-input
                                :value=" !empty($profile->project->project_json) ? json_encode(json_decode($profile->project->project_json, true), JSON_UNESCAPED_UNICODE) : ''"
                                name="my_project_tagify"
                                :requiredTrue="false"
                                placeholder="{{ __('Укажите ссылки через Enter') }}"
                                type="text"
                                label="{{ __('Мои проекты') }}"
                                default_class_label="text-sm w-full block mb-2 mt-2 font-medium text-gray-900 dark:text-white"
                                default_class_input="flex flex-nowrap w-full h-[125px] max-h-[180px] overflow-y-auto bg-gray-50 border border-gray-300 text-gray-900
                                text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                            />

                        </div>

                        <div class="flex mt-2 flex-row">

                            <div class="w-1/2">
                                <x-union.form.union-label-input
                                    name="password"
                                    :requiredTrue="false"
                                    placeholder="••••••••"
                                    type="password"
                                    label="{{ __('Новый пароль') }}"
                                    default_class_label="text-sm w-full block mb-2 mt-2 font-medium text-gray-900 dark:text-white" />
                            </div>
                            <div class="ml-3 w-1/2">
                                <x-union.form.union-label-input
                                    name="password_confirmation"
                                    :requiredTrue="false"
                                    placeholder="••••••••"
                                    type="password"
                                    label="{{ __('Повторите пароль') }}"
                                    default_class_label="text-sm w-full block mb-2 mt-2 font-medium text-gray-900 dark:text-white" />
                            </div>

                        </div>

                    </div>

                    <button type="submit"
                        class="mt-4 w-[140px] text-white bg-blue-700
                        hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                        font-medium rounded-lg text-sm px-5 py-1.5
                        dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none
                        dark:focus:ring-blue-800"
                        {{-- onkeydown="if(event.key === 'Enter') { event.preventDefault(); }" --}}
                    >
                        Сохранить
                    </button>

                </x-form>


            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="crud-modal-profile-additionally" tabindex="-1" aria-hidden="true" {{-- hidden --}}
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">

                <!-- Modal profile body -->
                <x-form class="p-4 md:p-5 bg-[#1f2937]" >

                    <div class="bg-[#1f2937] flex items-center justify-between p-4 md:p-5 mb-4 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Обновление дополнительной информации
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal-profile-additionally">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>


                    <div id="accordion-arrow-icon" data-accordion="open">
                        <h2 id="accordion-arrow-icon-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 bg-gray-100 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-arrow-icon-body-1" aria-expanded="true"
                                aria-controls="accordion-arrow-icon-body-1">
                                <span>Расскажите о себе</span>
                                <x-svg.pen width="22" height="22" class=" -me-0.5" />
                            </button>
                        </h2>
                        <div id="accordion-arrow-icon-body-1" aria-labelledby="accordion-arrow-icon-heading-1">

                            @livewire('profile-about-component', [
                                'profile' => $profile,
                                'message' => $profile?->about,
                            ])

                        </div>
                        <h2 id="accordion-arrow-icon-heading-2">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-arrow-icon-body-2" aria-expanded="false"
                                aria-controls="accordion-arrow-icon-body-2">
                                <span>Отметьте ваши умения</span>
                                <x-svg.check-box width="24" height="24" class=" -me-0.5" />
                            </button>
                        </h2>
                        <div id="accordion-arrow-icon-body-2" class="hidden"
                            aria-labelledby="accordion-arrow-icon-heading-2">

                            @livewire('profile-skill-check', [
                                'profileId' => $profile->id,
                                'checkSkills' => $checkSkills,
                            ])

                        </div>
                        <h2 id="accordion-arrow-icon-heading-3">
                            <button type="button"
                                class="rounded-bl-xl rounded-br-xl flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-arrow-icon-body-3" aria-expanded="false"
                                aria-controls="accordion-arrow-icon-body-3">
                                <span>Уровень умений</span>
                                <x-svg.skill-progress width="24" height="24" class=" -me-0.5" />
                            </button>
                        </h2>

                        @livewire('progres-skill-bar', [
                                'profileId' => $profile->id,
                                'inputValue' => $profile->skills,
                        ])
                    </div>

                </x-form>

            </div>
        </div>
    </div>


</div>
