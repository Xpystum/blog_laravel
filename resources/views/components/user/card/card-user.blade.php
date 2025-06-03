@props(['src', 'user', 'alt' => 'Изображения', 'span_name' => ''])

<div {{ $attributes->class($attributes->get('class', 'flex flex-row')) }}>
    <a href="{{ route('users.profiles', $user->id) }}" class="">
        <img class="w-12 min-w-12 max-w-12 h-12 rounded-full flex-shrink-0"
                src="{{ asset($user->profile->url_avatar) }}" alt="{{ $user->login }}">
        {{-- <img class="rounded-full ring-1 ring-gray-300 dark:ring-gray-500"  /> --}}
    </a>
    <a href="{{ route('users.profiles', $user->id) }}" class="flex items-center text-white dark:text-white text-center pl-2 hover:underline">
        {{ $span_name }}
    </a>

    {{ $slot }}
</div>
