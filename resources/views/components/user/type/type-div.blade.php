@props([])

<div {{ $attributes->class([

    "text-cyan-500 border-cyan-500 flex justify-center font-normal bg-white border
    rounded-full text-md py-1 dark:bg-gray-800 p-1 px-3"




]) }}>

    {{ $slot }}

</div>
