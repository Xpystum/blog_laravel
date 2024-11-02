<header class="dark:bg-gray-700 h-custom-height">

    <nav class="relative backdrop-blur-sm h-custom-height dark:bg-dark-gray-opacity text-white shadow-md fixed w-full top-0 start-0">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="max-mob-l:hidden h-8" alt="Flowbite Logo">
                <span class="max-mob-l:hidden self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <div class="max-mob-l:w-full flex max-mob-l:justify-center lg:order-2 gap-3">
                <a href="{{ route('register') }}" class="{{ active_link('register', 'dark:bg-blue-700') }}  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Регистрация</a>
                <a href="{{ route('login') }}" class="{{ active_link('login', 'dark:bg-blue-700') }} text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Вход</a>
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Открыть главное меню</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 lg:p-0 mt-5
                    max-md:hover:text-blue-700
                    max-md:bg-dark-black-opacity
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

