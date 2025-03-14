@props(['name' => null, 'value_text' => 'Загрузить Файл'])



<div {{ $attributes->class([

    'flex items-center justify-center w-full'

])->merge([

    'type' => 'file',


])  }} >

    @if ( (!empty($value_text)) || ($value_text === null) )
        <label class="block mx-2 text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap" for="file_input" >{{ __($value_text) }}</label>
    @endif

    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
        cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600
        dark:placeholder-gray-400"
        aria-describedby="file_input_help"
        id="file_input"
        type="file"

        @isset($name)
            name="{{ $name }}"
        @endisset
    >

</div>


