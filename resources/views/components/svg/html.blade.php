@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'HTML 5', 'workTooltip' => 'true', 'data_tooltip_target' => 'tooltip-svg-html'])
<div data-tooltip-target="{{ $data_tooltip_target }}" {{ $attributes->merge([
    'class' => 'flex justify-center items-center relative p-1 block rounded-md' . (($workTooltip === 'true') ? "hover:bg-gray-700" : "")
]) }}>

    <svg width="{{ $width }}" height="{{ $height }}" class="_o2IXcpM0qnG3JPReKus E9GV5sZJIbfO_GEQ_moc" aria-hidden="true" viewBox="0 0 13 18" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M4.12301 0.771564H4.80021V2.31469H5.56748V0.771564H6.24801V0H4.12301V0.771564ZM2.31024 2.81701e-05H1.54297V2.31473H2.31691V1.54316H3.01746V2.31473H3.78473V2.81701e-05H3.01746V0.764886H2.31024V2.81701e-05ZM6.58398 2.81701e-05H7.38795L7.88167 0.815203L8.37539 2.81701e-05H9.17935V2.31472H8.41208V1.16744L7.875 1.99939L7.33791 1.16744V2.31472H6.58398V2.81701e-05ZM10.3278 2.81701e-05H9.56055V2.31472H11.4153V1.54987H10.3278V2.81701e-05Z"
            fill="black" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-000000, #e8e6e3);"></path>
        <path d="M1.51493 15.8006L0.414062 3.375H12.5169L11.416 15.7939L6.45547 17.176" fill="#E44D26"
            data-darkreader-inline-fill="" style="--darkreader-inline-fill: var(--darkreader-text-e44d26, #e65d3a);">
        </path>
        <path d="M6.46484 16.119V4.39453H11.4121L10.468 14.9952" fill="#F16529" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-f16529, #f27139);"></path>
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M6.46706 5.91406H2.66406L3.07772 10.5166H6.46706V8.99697H4.46548L4.32537 7.43707H6.46706V5.91406ZM4.66377 11.2822H3.14258L3.35608 13.6741L6.46518 14.5463V12.9562L4.77052 12.5L4.66377 11.2822Z"
            fill="#EBEBEB" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-ebebeb, #dbd8d4);"></path>
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M6.45898 5.91406H10.2553L10.1152 7.43707H6.45898V5.91406ZM6.45703 8.99756H9.97646L9.55946 13.6739L6.45703 14.5394V12.956L8.14836 12.4998L8.32516 10.5206H6.45703V8.99756Z"
            fill="white" data-darkreader-inline-fill=""
            style="--darkreader-inline-fill: var(--darkreader-text-ffffff, #e8e6e3);"></path>
    </svg>

    @if ($workTooltip === 'true')
        <div id="{{ $data_tooltip_target }}" role="tooltip"
            class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            {{ $description_toll_tip }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    @endif
</div>
