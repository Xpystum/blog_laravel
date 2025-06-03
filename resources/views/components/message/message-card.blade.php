@props(['message', 'orientation' => 'left'])



@if ($orientation === 'left')
    <div class="flex flex-row">
        <a class="mr-2">
            <img class="w-12 min-w-12 max-w-12 h-12 rounded-full flex-shrink-0"
                src="{{ asset($message->user->profile->url_avatar) }}" alt="{{ $message->user->login }}">
        </a>

        <div class="flex flex-col">
            <div class="flex flex-row mb-1">
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $message->user->login }}</span>
                <span
                    class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">{{ translate_ru_format_date($message->created_at) }}</span>
            </div>
            <div
                class="flex flex-col w-full max-md:max-w-[320px] max-w-[420px] leading-1.5 p-2.5 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">

                <p
                    class="text-sm font-normal py-2.5 text-gray-900 dark:text-white overflow-x-hidden whitespace-normal break-words">
                    {{ $message->message }}
                </p>

                @if (Auth::user()?->id === $message->user_id)
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> </span>
                @endif
            </div>
        </div>

        {{-- @if (!$last)
            <div class="relative self-center w-5/6">
                <div class="relative w-full h-1 border-b border-gray-500 opacity-50">
                </div>

                <div class="absolute left-0 top-1 w-1 h-10 border-l border-gray-500 opacity-50"></div>
            </div>
        @endif --}}

    </div>
@else
    <div class="flex flex-row-reverse gap-2.5">
        <a class="#">
            <img class="w-12 min-w-12 max-w-12 h-12 rounded-full flex-shrink-0"
                src="{{ asset($message->user->profile->url_avatar) }}" alt="{{ $message->user->login }}">
        </a>
        <div class="flex flex-col">
            <div class="ml-auto mb-1 flex flex-row">
                <span class="mr-2 text-sm font-semibold text-gray-900 dark:text-white">{{ $message->user->login }}</span>
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ translate_ru_format_date($message->created_at)  }}</span>
                </div>
            </div>
            <div class="flex flex-col w-full max-md:max-w-[320px] max-w-[420px] leading-1.5 p-2.5 border-gray-200 bg-gray-100 rounded-s-xl rounded-se-xl rounded-tr-none rounded-br-xl dark:bg-gray-700">

                <p
                    class="text-sm font-normal py-2.5 text-gray-900 dark:text-white overflow-x-hidden whitespace-normal break-words">
                    {{ $message->message }}
                </p>
                {{-- @if (Auth::user()?->id === $message->user_id)
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> {{ $status }} </span>
                @endif --}}
            </div>
        </div>


        {{-- @if (!$last)
            <div class="relative self-center w-5/6">
                <div class="relative w-full h-1 border-b border-gray-500 opacity-50">
                </div>

                <div class="absolute left-0 top-1 w-1 h-10 border-l border-gray-500 opacity-50"></div>
            </div>
        @endif --}}

    </div>
@endif
