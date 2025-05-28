@php
    $user = Auth::user();
    $profile = $user->profile;
@endphp

<div class="flex items-center space-x-3 md:space-x-0 rtl:space-x-reverse">
    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-10 h-10 md:w-12 md:h-12 p-0.5 rounded-full ring-1 ring-gray-300 dark:ring-gray-500" src={{ asset($profile->url_avatar) }} alt="Фото пользователя">
        {{-- <img class="w-10 h-10 md:w-12 md:h-12 rounded-full" src={{ asset(Auth::user()->url_avatar) }} alt="Фото пользователя"> --}}
    </button>
    <!-- Dropdown menu -->
    <div class="w-auto z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">{{ $user->login }}</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ $user->email }}</span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
        <li>
            <a href="{{ route('users.profiles', $user->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Профиль</a>
        </li>
        <li>
            <a href="{{ route('users.posts', $user->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Мои Статьи</a>
        </li>
        <li>
            <a href="{{ route('users.posts.view.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Создать статью</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
        </li>
        <li>

            <button type="button" x-data x-on:click="$refs.logout_form.submit()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                {{ __('Выйти из Аккаунта') }}
                <x-form class="d-none" x-ref="logout_form" action="{{ route('logout') }}" method="post" />
            </button>

        </li>
        </ul>
    </div>
</div>
