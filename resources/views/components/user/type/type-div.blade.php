@props([])

<div {{ $attributes->class([

    "flex justify-center font-normal bg-white border
    rounded-full text-sm py-1 dark:bg-gray-800 p-1 px-3 min-w-[100px] w-2/3",


    "text-green-500 border-green-500" => $slot == 'Дизайнер',
    "text-cyan-500 border-cyan-500" => $slot == 'Разработчик',
    "text-gray-300 bg-gray-300 border-gray-300" => $slot == 'Другое',


]) }}>

    {{ $slot }}

</div>
