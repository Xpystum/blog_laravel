@props([
    'width' => 24,
    'height' => 24,
    'description_toll_tip' => 'Sketch',
    'data_tooltip_target' => 'tooltip-svg-sketch',
    'workTooltip' => 'true',
])
<div data-tooltip-target="{{ $data_tooltip_target }}"
    {{ $attributes->merge([
        'class' => ($workTooltip === 'true') ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : "flex justify-center items-center relative p-1 block rounded-md" ,
    ]) }}>
    <svg width="{{ $width }}" height="{{ $height }}" class="_o2IXcpM0qnG3JPReKus E9GV5sZJIbfO_GEQ_moc"
        aria-hidden="true" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M4.29749 1.44122L8.98499 0.9375L13.6725 1.44122L17.3015 6.39306L8.98499 16.237L0.668457 6.39306L4.29749 1.44122Z"
            fill="#FDB300" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-fdb300, #ffbc1b);"></path>
        <path d="M4.03512 6.39453L8.98304 16.2384L0.666504 6.39453H4.03512Z" fill="#EA6C00"
            data-darkreader-inline-fill="" style="--darkreader-inline-fill: var(--darkreader-text-ea6c00, #ff8b28);">
        </path>
        <path d="M13.9288 6.39453L8.98082 16.2384L17.2974 6.39453H13.9288Z" fill="#EA6C00"
            data-darkreader-inline-fill="" style="--darkreader-inline-fill: var(--darkreader-text-ea6c00, #ff8b28);">
        </path>
        <path d="M4.03369 6.39453H13.9295L8.98162 16.2384L4.03369 6.39453Z" fill="#FDAD00"
            data-darkreader-inline-fill="" style="--darkreader-inline-fill: var(--darkreader-text-fdad00, #ffb71b);">
        </path>
        <path d="M8.98357 0.9375L4.29605 1.44121L4.03564 6.39305L8.98357 0.9375Z" fill="#FDD231"
            data-darkreader-inline-fill="" style="--darkreader-inline-fill: var(--darkreader-text-fdd231, #fdd43c);">
        </path>
        <path d="M8.98225 0.9375L13.6698 1.44121L13.9302 6.39305L8.98225 0.9375Z" fill="#FDD231"
            data-darkreader-inline-fill="" style="--darkreader-inline-fill: var(--darkreader-text-fdd231, #fdd43c);">
        </path>
        <path d="M17.2993 6.39324L13.6703 1.44141L13.9307 6.39324H17.2993Z" fill="#FDAD00"
            data-darkreader-inline-fill="" style="--darkreader-inline-fill: var(--darkreader-text-fdad00, #ffb71b);">
        </path>
        <path d="M0.666504 6.39324L4.29552 1.44141L4.03512 6.39324H0.666504Z" fill="#FDAD00"
            data-darkreader-inline-fill="" style="--darkreader-inline-fill: var(--darkreader-text-fdad00, #ffb71b);">
        </path>
        <path d="M8.98357 0.9375L4.03564 6.39305H13.9315L8.98357 0.9375Z" fill="#FEEEB7" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-feeeb7, #fee79a);"></path>
    </svg>


    @if ($workTooltip === 'true')
        <div id="{{ $data_tooltip_target }}" role="tooltip"
            class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            {{ $description_toll_tip }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    @endif
</div>
