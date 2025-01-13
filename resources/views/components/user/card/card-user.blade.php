@props(['src' , 'alt' => 'Изображения', 'span_name' => ''])

<div {{ $attributes->class($attributes->get('class', 'flex flex-row')) }}>
    <a href="#" class="w-10 h-10 md:w-12 md:h-12 p-0.5 rounded-full ring-1 ring-gray-300 dark:ring-gray-500">
        <img  src='{{ $src }}' alt='{{ $alt }}' />
    </a>
    <a href="#" class="flex items-center text-white dark:text-white text-center pl-2 hover:underline">
        {{ $span_name }}
    </a>

    {{ $slot }}
</div>
