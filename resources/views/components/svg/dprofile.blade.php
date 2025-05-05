@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'Dprofile', 'href' => '#', 'data_tooltip_target' => 'tooltip-svg-dprofile', 'workTooltip' => true])
<a @if($workTooltip)
    @if($workTooltip)
        data-tooltip-target="{{ $data_tooltip_target }}"
    @endif
@endif href="{{ $href }}" {{ $attributes->merge([
    'class' => ($workTooltip) ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : "flex justify-center items-center relative p-1 block rounded-md" ,
    ]) }}>
    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
        class="logo__icon" data-v-14be08e2="" data-darkreader-inline-invert="">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M28.327 3.45l8.224 8.223c4.599 4.599 4.599 12.055 0 16.654l-8.224 8.224c-4.599 4.599-12.055 4.599-16.654 0l-8.224-8.224c-4.599-4.599-4.599-12.055 0-16.654l8.224-8.224c4.599-4.599 12.055-4.599 16.654 0zM5.5 24.792v-9.586C5.5 9.846 9.846 5.5 15.207 5.5h9.586c5.361 0 9.707 4.346 9.707 9.707v9.586c0 5.361-4.346 9.707-9.707 9.707h-9.586c-5.361 0-9.707-4.346-9.707-9.707z">
        </path>
        <path
            d="M36.488 1c.434.001.861.112 1.24.322.397.21.724.531.94.923a2.52 2.52 0 010 2.5c-.217.39-.54.712-.934.928A2.555 2.555 0 0136.482 6a2.583 2.583 0 01-1.219-.333 2.365 2.365 0 01-.928-.928 2.493 2.493 0 010-2.5c.213-.394.535-.72.928-.939a2.544 2.544 0 011.225-.3zm0 .41a2.163 2.163 0 00-1.033.272c-.33.177-.602.444-.785.77a2.097 2.097 0 000 2.085c.18.325.451.592.78.77a2.092 2.092 0 002.087 0c.328-.178.599-.445.78-.77a2.097 2.097 0 000-2.085 1.933 1.933 0 00-.786-.77 2.163 2.163 0 00-1.043-.272zm-1 3.373V2.092h.928c.233-.011.467.013.692.07.14.047.26.14.34.263a.713.713 0 01.073.671.704.704 0 01-.16.235.81.81 0 01-.55.245.759.759 0 01.231.142c.153.168.288.35.401.546l.33.546h-.55l-.24-.426a2.185 2.185 0 00-.457-.627.585.585 0 00-.351-.093h-.258V4.81l-.429-.027zm.434-1.518h.55a.833.833 0 00.515-.114.356.356 0 00.143-.295.32.32 0 00-.071-.213.39.39 0 00-.181-.142 1.325 1.325 0 00-.44-.049h-.5l-.016.813z">
        </path>
    </svg>


    @if ($workTooltip)
        <div id="{{ $data_tooltip_target }}" role="tooltip"
            class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            {{ $description_toll_tip }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    @endif
</a>
