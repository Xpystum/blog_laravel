@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->class(['font-medium text-primary-600 hover:underline dark:text-primary-500']) }}>
    {{ $slot }}
</a>
