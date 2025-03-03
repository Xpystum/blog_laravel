<div class="w-full flex flex-row">
  <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Открыть меню профиля</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <x-user.navigation.sidebar-menu />

    <div class="flex h-[500px] ml-2 p-5 mb-4 rounded bg-gray-50 dark:bg-gray-800 w-full h-85vh">

        <div>
            <h2>Информация пользователя</h2>
            <div class="flex ">
                <img class="w-28 h-28" src={{ asset(Auth::user()->url_avatar) }} alt="Фото пользователя">
                <div class="flex flex-col justify-center ml-2">



                    {{-- <div>Дизайнер</div> --}}

                    {{-- <div class="text-cyan-500 border-cyan-500 flex justify-center font-normal bg-white border
                        rounded-full text-md py-1 dark:bg-gray-800">
                        Разработчик
                    </div> --}}

                    {{-- <div class="text-cyan-500 border-cyan-500 flex justify-center font-normal bg-white border
                        rounded-full text-md py-1 dark:bg-gray-800">
                        Разработчик
                    </div> --}}


                    <div>
                        <span class="block text-lg text-gray-900 dark:text-white font-medium">{{ Auth::user()->login }}</span>
                        {{-- <span class="block text-lg text-gray-900 dark:text-white">{{ Auth::user()->email }}</span> --}}
                    </div>

                    <x-user.type.type-div class="mt-1">Разработчик</x-user.type.type-div>
                    <x-user.type.type-div class="mt-1 text-green-500 border-green-500">Дизайнер</x-user.type.type-div>
                    {{-- <span class="block text-lg  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span> --}}
                </div>
            </div>

            {{-- Блок профиля и редактирование аватарки --}}
        </div>

    </div>

</div>
