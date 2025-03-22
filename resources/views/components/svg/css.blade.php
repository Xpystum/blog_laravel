@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'CSS', 'data_tooltip_target' => 'tooltip-svg-css', 'workTooltip' => 'true'])
<div {{ $attributes->merge([
    'class' => ($workTooltip === 'true') ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : "flex justify-center items-center relative p-1 block rounded-md" ,
]) }} data-tooltip-target="{{ $data_tooltip_target }}" >

    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_8_16)">
        <path d="M18.375 0H5.625C2.5184 0 0 2.5184 0 5.625V18.375C0 21.4816 2.5184 24 5.625 24H18.375C21.4816 24 24 21.4816 24 18.375V5.625C24 2.5184 21.4816 0 18.375 0Z" fill="#0277BD"/>
        <path d="M5.03934 9.62353L5.30766 12.6181H12.009V9.62353H5.03934ZM12.0089 3.5625H4.5L4.77225 6.55706H12.0089V3.5625ZM12.0089 20.5163V17.4008L11.9958 17.4042L8.66072 16.5037L8.44753 14.1154H5.44144L5.86097 18.8173L11.9951 20.5202L12.0089 20.5163Z" fill="#EBEBEB"/>
        <path d="M15.6861 12.6181L15.3384 16.5018L11.9986 17.4033V20.5187L18.1376 18.8173L18.1826 18.3113L18.8863 10.4277L18.9593 9.62353L19.5 3.5625H11.9986V6.55706H16.2182L15.9458 9.62353H11.9986V12.6181H15.6861Z" fill="white"/>
        </g>
        <defs>
        <clipPath id="clip0_8_16">
        <rect width="24" height="24" fill="white"/>
        </clipPath>
        </defs>
    </svg>

    <div id="{{ $data_tooltip_target }}" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
        {{ $description_toll_tip }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>




