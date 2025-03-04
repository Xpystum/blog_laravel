@props([])

<div {{ $attributes->class([

    "flex justify-center font-normal bg-white border
    rounded-full text-md py-1 dark:bg-gray-800 p-1 px-3 w-1/2",


    "text-green-500 border-green-500" => $slot == 'Дизайнер',
    "text-cyan-500 border-cyan-500" => $slot == 'Разработчик',


]) }}>

    {{ $slot }}

</div>
