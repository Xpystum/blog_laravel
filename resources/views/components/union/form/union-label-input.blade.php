@props(['type' => 'text', 'name' => 'text', 'label' => 'Ваш текст', 'autofocus' => ''])

<div class="w-full">

    @if ($label != 'false')
        <x-label :for="$name" class="text-xl max-lg:text-lg max-md:text-md max-sm:text-sm max-mob-m:text-xs w-full block mb-2 font-medium text-gray-900 dark:text-white">
            {{__($label)}}
        </x-label>
    @endif

    <x-input.input placeholder="{{ $attributes->get('placeholder') }}" :autofocus="$autofocus" :type="$type" :name="$name" :id="$name" class="w-full bg-gray-50 border border-gray-300 text-gray-900
        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>
</div>

