@props(['class_name' => ' progres_slider ', 'class_value_progress_bar' => ''])
<div class="flex flex-row h-full w-full items-center justify-center">

    {{ $slot }}

    <div class="w-full flex item-center">
        <div {{ $attributes->merge([

            'class' => 'w-full'  . " " . $class_name . " " . $class_value_progress_bar

    ]) }}>

        </div>
    </div>

</div>
