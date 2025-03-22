@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'Figma', 'data_tooltip_target' => 'tooltip-svg-figma', 'workTooltip' => 'true'])
<div data-tooltip-target="{{ $data_tooltip_target }}" {{ $attributes->merge([
    'class' => ($workTooltip === 'true') ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : "flex justify-center items-center relative p-1 block rounded-md" ,
]) }}>
    <svg width="{{ $width }}" height="{{ $height }}" class="_o2IXcpM0qnG3JPReKus E9GV5sZJIbfO_GEQ_moc" aria-hidden="true" viewBox="0 0 12 17" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M3.07953 16.9342C4.61287 16.9342 5.85731 15.6877 5.85731 14.1517V11.3691H3.07953C1.5462 11.3691 0.301758 12.6157 0.301758 14.1517C0.301758 15.6877 1.5462 16.9342 3.07953 16.9342Z"
            fill="#0ACF83" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-0acf83, #3df6af);"></path>
        <path
            d="M0.301758 8.58723C0.301758 7.05127 1.5462 5.80469 3.07953 5.80469H5.85731V11.3698H3.07953C1.5462 11.3698 0.301758 10.1232 0.301758 8.58723Z"
            fill="#A259FF" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-a259ff, #a158ff);"></path>
        <path
            d="M0.301758 3.02278C0.301758 1.48682 1.5462 0.240234 3.07953 0.240234H5.85731V5.80533H3.07953C1.5462 5.80533 0.301758 4.55875 0.301758 3.02278Z"
            fill="#F24E1E" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-f24e1e, #f35d31);"></path>
        <path
            d="M5.8584 0.240234H8.63618C10.1695 0.240234 11.414 1.48681 11.414 3.02278C11.414 4.55874 10.1695 5.80532 8.63618 5.80532H5.8584V0.240234Z"
            fill="#FF7262" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-ff7262, #ff6e5e);"></path>
        <path
            d="M11.414 8.58723C11.414 10.1232 10.1695 11.3698 8.63618 11.3698C7.10284 11.3698 5.8584 10.1232 5.8584 8.58723C5.8584 7.05127 7.10284 5.80469 8.63618 5.80469C10.1695 5.80469 11.414 7.05127 11.414 8.58723Z"
            fill="#1ABCFE" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-1abcfe, #2cc1fe);"></path>
    </svg>

    @if ($workTooltip === 'true')
        <div id="{{ $data_tooltip_target }}" role="tooltip"
            class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            {{ $description_toll_tip }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    @endif
</div>
