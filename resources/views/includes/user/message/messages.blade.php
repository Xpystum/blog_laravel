@php
    $user = Auth::user();
    // $me_profile = $chatPersonals->me_profile;
    // $other_profile = $chatPersonals->other_profile;
@endphp

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div
        class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        <div>
            {{-- <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button> --}}
            <!-- Dropdown menu -->
            <div id="dropdownAction"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate
                            account</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                        User</a>
                </div>
            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>

        <div class="relative mx-auto w-1/2">

            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>

            <input type="text" id="table-search-users"
                class="block w-full pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50
            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
            dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search for users">

        </div>

    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Имя Пользователя
                </th>
                <th scope="col" class="px-6 py-3">
                    Чат с пользователем
                </th>
                <th scope="col" class="px-6 py-3">
                    Статус на сайте
                </th>
                <th scope="col" class="px-6 py-3">
                    Чат
            </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($chatPersonals as $item)

                @php
                    //разделяем автиризированно пользователя, от другого
                    $otherProfile = ( $item->userOne->is($user->profile) ) ? $item->userTwo : $item->userOne ;
                    $meProfile = ( $item->userOne->is($user->profile) ) ? $item->userOne : $item->userTwo ;
                @endphp

                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="{{ asset($otherProfile->url_avatar) }}"
                            alt="Аватар {{ $otherProfile->login }}">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $otherProfile->user->login }}</div>
                            <x-user.type.type-div class="mt-2">{{ $otherProfile->type }}</x-user.type.type-div>
                            {{-- <div class="font-normal text-gray-500">neil.sims@flowbite.com</div> --}}
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->lastMessage->first()->message }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('users.messages.private', $item->id) }}" type="button"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Открыть чат</a>
                    </td>
                </tr>

            @empty
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td colspan="4" class="px-6 py-4 text-center text-gray-200">
                        У вас ещё нет созданных чатов с пользователями.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>
