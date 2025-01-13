@props(['src' , 'alt' => 'Изображения', 'span_name' => ''])

<div {{ $attributes->class($attributes->get('class', 'flex flex-row')) }}>
    <img class="w-10 h-10 md:w-12 md:h-12 p-0.5 rounded-full ring-1 ring-gray-300 dark:ring-gray-500" src='{{ $src }}' alt='{{ $alt }}' />

    <span class="flex items-center text-white dark:text-white justify-center text-center pl-2 w-full">{{ $span_name }}</span>
    {{ $slot }}
</div>
