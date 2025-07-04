@props([
    'class_name' => 'progres_slider',
    'class_value_progress_bar' => '',
    'input_name' => 'name',
    'value' => 0,
])
<div class="flex flex-row h-full w-full items-center justify-center">

    {{ $slot }}

    <div class="w-full flex item-center">
        <div {{ $attributes->merge([
            'class' => 'w-full'  . " " . $class_name . " " . $class_value_progress_bar
        ]) }}>

            <input type="hidden" name="{{ $input_name }}" id="{{ $input_name }}" value={{ $value }} {{ $attributes }}>

        </div>
    </div>

</div>
