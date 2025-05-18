@props(['name_label' => 'name_label', 'for_label' => 'bordered-checkbox'])
<div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">

    {{ $slot }}

    <input id="{{ $for_label }}" type="checkbox" value="" name="{{ $for_label }}"
        {{
            $attributes->merge(['class' => 'form-control w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm
            focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600'])
        }}>

    <label for="{{ $for_label }}"
        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $name_label }}</label>

</div>
