@props(['orientation' => 'left', 'comment' => null, 'dropdownDotsNumber' => null, 'last' => false])

@php
    $status = 'Доставлено';
@endphp

@if($orientation === 'left')

    <div class="flex items-start gap-2.5 mb-5">
        <a class="">
            <img class="w-12 min-w-12 max-w-12 h-12 rounded-full flex-shrink-0" src="{{ asset($comment->user->profile->url_avatar) }}" alt="{{ $comment->user->login }}">
        </a>
        <div class="flex flex-col w-full max-md:max-w-[320px] max-w-[420px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">

            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $comment->user->login }}</span>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ translate_ru_format_date($comment->created_at) }}</span>
                @if(Auth::user()?->id === $comment->user_id)
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 flex-grow text-right">Вы</span>
                @endif
            </div>

            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white overflow-x-hidden whitespace-normal break-words">
                {{ $comment->value }}
            </p>
            @if(Auth::user()?->id === $comment->user_id)
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> {{ $status }} </span>
            @endif
        </div>
        <button id="dropdownMenuIconButton" data-dropdown-toggle={{ "dropdownDots" . $dropdownDotsNumber }} data-dropdown-placement="bottom-start" class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600" type="button">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
            <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
        </svg>
        </button>
        <div id={{ "dropdownDots" . $dropdownDotsNumber }} class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-40 dark:bg-gray-700 dark:divide-gray-600">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ответить</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Копировать</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Жалоба</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Удалить</a>
            </li>
        </ul>
        </div>

        @if (!$last)
            <div class="relative self-center w-5/6">
                <div class="relative w-full h-1 border-b border-gray-500 opacity-50">
                </div>

                <div class="absolute right-0 top-1 w-1 h-10 border-r border-gray-500 opacity-50"></div>
            </div>
        @endif

    </div>


@elseif ($orientation === 'right')

    <div class="flex flex-row-reverse gap-2.5">
        <a class="">
            <img class="w-12 min-w-12 max-w-12 h-12 rounded-full flex-shrink-0" src="{{ asset($comment->user->profile->url_avatar) }}" alt="{{ $comment->user->login }}">
        </a>
        <div class="flex flex-col w-full max-md:max-w-[320px] max-w-[420px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-s-xl rounded-se-xl rounded-tr-none rounded-br-xl dark:bg-gray-700">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $comment->user->login }}</span>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ translate_ru_format_date($comment->created_at) }}</span>
                @if(Auth::user()?->id === $comment->user_id)
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 flex-grow text-right">Вы</span>
                @endif
            </div>
            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white overflow-x-hidden whitespace-normal break-words">
                {{ $comment->value }}
            </p>
            @if(Auth::user()?->id === $comment->user_id)
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> {{ $status }} </span>
            @endif
        </div>
        <button id="dropdownMenuIconButton" data-dropdown-toggle={{ "dropdownDots" . $dropdownDotsNumber }} data-dropdown-placement="bottom-start" class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600" type="button">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
            <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
        </svg>
        </button>
        <div id={{ "dropdownDots" . $dropdownDotsNumber }} class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-40 dark:bg-gray-700 dark:divide-gray-600">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ответить</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Копировать</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Жалоба</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Удалить</a>
            </li>
        </ul>
        </div>

        @if (!$last)
            <div class="relative self-center w-5/6">
                <div class="relative w-full h-1 border-b border-gray-500 opacity-50">
                </div>

                <div class="absolute left-0 top-1 w-1 h-10 border-l border-gray-500 opacity-50"></div>
            </div>
        @endif

    </div>

@endif


