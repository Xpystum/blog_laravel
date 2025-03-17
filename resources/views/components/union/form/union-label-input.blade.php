@props(['type' => 'text', 'name' => 'text', 'label' => 'Ваш текст', 'autofocus' => '',
    'default_class_label' => 'text-xl max-lg:text-lg max-md:text-md max-sm:text-sm max-mob-m:text-xs w-full block mb-2 font-medium text-gray-900 dark:text-white',
    'default_class_input' => 'flex flex-nowrap w-full h-[42px] max-h-[53px] overflow-y-hidden bg-gray-50 border border-gray-300 text-gray-900
        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600
        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
    'default_div_class' => 'w-full',
    'statusReadonly' => '',
])


<div class="{{ $default_div_class }}">

    @if ($label != 'false')
        <x-label :for="$name" class="{{ $default_class_label }}">
            {{__($label)}}
        </x-label>
    @endif

    {{ $slot }}

    <x-input.input
        placeholder="{{ $attributes->get('placeholder') }}"
        :autofocus="$autofocus"
        :type="$type"
        :name="$name"
        :id="$name"
        class="{{ $default_class_input }}"

        statusReadonly="{{ $statusReadonly }}"

        required />
</div>

