@props(['name' => null])

<div {{ $attributes->class([

    'flex items-center justify-center w-full'

])->merge([

    'type' => 'file',
    //Возврат старых введёных данных
    // 'value' => ( (old($attributes->get('name'))) ?: null),

])  }} >

    <label class="block mx-2 text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap" for="file_input" >{{ __('Загрузить обложку статьи') }}</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
        cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600
        dark:placeholder-gray-400"
        aria-describedby="file_input_help"
        id="file_input"
        type="file"
        value="file"
        @isset($name)
            name="{{ $name }}"
        @endisset
    >

</div>



{{--
<div {{ $attributes->class([



])->merge([

    'type' => 'file',
    //Возврат старых введёных данных
    'value' => ( (old($attributes->get('name'))) ?: null),

])  }} >

    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Загрузить Обложку Статьи</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">

</div> --}}

