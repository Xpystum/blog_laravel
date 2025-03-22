@props(['id' => 'progres_slider'])
<div class="flex flex-row h-full w-full items-center justify-center">

    {{ $slot }}

    <div class="w-full flex item-center">
        <div class="ml-6 w-full" id="{{ $id }}"></div>
    </div>

</div>
