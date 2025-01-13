<header class="fixed w-full top-0 left-0 h-custom-height z-50 backdrop-blur-sm bg-gray-800 bg-opacity-50">
    <nav class="h-custom-height text-white shadow-md bg-transparent">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="max-mob-l:hidden h-8" alt="Flowbite Logo">
                <span class="max-mob-l:hidden self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>


            @if (auth()->check())

                <div class="max-mob-l:w-full flex max-mob-l:justify-evenly lg:order-3 gap-3">
                    <x-user.dropdown.user-menu-dropdown />
                    <x-buttons.burger-button />
                </div>


            @else
                <div class="max-mob-l:w-full flex max-mob-l:justify-center gap-3 order-3">
                    <a href="{{ route('register') }}" class="{{ active_link('register', 'dark:bg-blue-700') }} flex items-center justify-cente  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Регистрация</a>
                    <a href="{{ route('login') }}" class="{{ active_link('login', 'dark:bg-blue-700') }} flex items-center justify-cente text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Вход</a>
                    <x-buttons.burger-button />
                </div>
            @endif


            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto order-4 lg:order-2" id="navbar-sticky">
                <ul class="max-mob-s-not-equally:overflow-auto flex flex-col p-4 lg:p-0 mt-5
                    max-lg-not-equally:hover:text-blue-700
                    max-lg-not-equally:bg-dark-black-opacity
                lg:space-x-3 xl:space-x-6 2xl:space-x-12 lg:flex-row lg:mt-0 lg:border-0 font-medium border-gray-100 rounded-lg  rtl:space-x-reverse">
                    <li>
                        {{-- {{ active_link('home') }}  --}}
                        <a href="{{ route('home') }}" class=" {{ active_link('home', 'bg-gray-700') }} block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 max-lg:hover:bg-transparent max-lg:hover:text-blue-700 max-lg:p-0 max-lg:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white max-lg:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">
                            {{ __('Главная') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100  :hover:bg-transparent max-lg:hover:text-blue-700 max-lg:p-0 max-lg:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white max-lg:dark:hover:bg-transparent dark:border-gray-700">Блог Разработчиков</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 max-lg:hover:bg-transparent max-lg:hover:text-blue-700 max-lg:p-0 max-lg:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white max-lg:dark:hover:bg-transparent dark:border-gray-700">Блог Дизайнеров</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 max-lg:hover:bg-transparent max-lg:hover:text-blue-700 max-lg:p-0 max-lg:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white max-lg:dark:hover:bg-transparent dark:border-gray-700">О нас</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 max-lg:hover:bg-transparent max-lg:hover:text-blue-700 max-lg:p-0 max-lg:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white max-lg:dark:hover:bg-transparent dark:border-gray-700">Контакты</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

