@props([
    'width' => 24,
    'height' => 24,
    'description_toll_tip' => 'NextJs',
    'data_tooltip_target' => 'tooltip-svg-nextjs',
    'workTooltip' => 'true',
])
<div data-tooltip-target="{{ $data_tooltip_target }}" data-tooltip-trigger="hover"
    {{ $attributes->merge([
        'class' => ($workTooltip === 'true') ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : "flex justify-center items-center relative p-1 block rounded-md" ,
    ]) }}>

    {{-- <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_4_30)">
            <mask id="mask0_4_30" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="24"
                height="24">
                <path
                    d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z"
                    fill="white" />
            </mask>
            <g mask="url(#mask0_4_30)">
                <path
                    d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z"
                    fill="black" />
                <path
                    d="M19.9344 21.0026L9.2189 7.2H7.2V16.796H8.81512V9.25125L18.6666 21.9793C19.1104 21.6823 19.534 21.356 19.9344 21.0026Z"
                    fill="url(#paint0_linear_4_30)" />
                <path d="M15.3334 7.2H16.9334V16.8H15.3334V7.2Z" fill="url(#paint1_linear_4_30)" />
            </g>
        </g>
        <defs>
            <linearGradient id="paint0_linear_4_30" x1="715.655" y1="840.532" x2="1140.91" y2="1367.62"
                gradientUnits="userSpaceOnUse">
                <stop stop-color="white" />
                <stop offset="1" stop-color="white" stop-opacity="0" />
            </linearGradient>
            <linearGradient id="paint1_linear_4_30" x1="95.3349" y1="7.2" x2="92.6278" y2="712.195"
                gradientUnits="userSpaceOnUse">
                <stop stop-color="white" />
                <stop offset="1" stop-color="white" stop-opacity="0" />
            </linearGradient>
            <clipPath id="clip0_4_30">
                <rect width="24" height="24" fill="white" />
            </clipPath>
        </defs>
    </svg> --}}

    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_9_33)">
        <path d="M18.375 0H5.625C2.5184 0 0 2.5184 0 5.625V18.375C0 21.4816 2.5184 24 5.625 24H18.375C21.4816 24 24 21.4816 24 18.375V5.625C24 2.5184 21.4816 0 18.375 0Z" fill="#F4F2ED"/>
        <path d="M11.386 2.63006C11.3457 2.63372 11.2174 2.64656 11.1019 2.65566C8.43881 2.89575 5.94431 4.33275 4.36434 6.54131C3.48469 7.76934 2.92191 9.16228 2.70937 10.6378C2.63428 11.1529 2.62509 11.305 2.62509 12.0033C2.62509 12.7016 2.63428 12.8538 2.70947 13.3688C3.21891 16.8896 5.72447 19.8479 9.12253 20.9439C9.73106 21.1401 10.3725 21.2738 11.102 21.3545C11.3861 21.3856 12.6141 21.3856 12.8982 21.3545C14.1574 21.2152 15.2241 20.9036 16.2761 20.3665C16.4374 20.2841 16.4686 20.2621 16.4466 20.2438C16.4319 20.2328 15.7446 19.3108 14.9198 18.1965L13.4206 16.1712L11.5418 13.3908C10.5082 11.8622 9.65775 10.6121 9.65034 10.6121C9.64303 10.6103 9.63572 11.8457 9.63206 13.3541C9.62653 15.9953 9.62475 16.1016 9.59175 16.1638C9.54412 16.2536 9.50747 16.2903 9.43041 16.3307C9.37181 16.3599 9.32044 16.3655 9.04369 16.3655H8.72662L8.64225 16.3123C8.59001 16.2796 8.54758 16.2334 8.51944 16.1785L8.481 16.096L8.48475 12.4212L8.49019 8.74453L8.547 8.673C8.57634 8.63456 8.63869 8.58506 8.68266 8.56125C8.75775 8.52459 8.78709 8.52094 9.10416 8.52094C9.47812 8.52094 9.54038 8.53556 9.63759 8.64188C9.66506 8.67122 10.6822 10.2035 11.8993 12.0491C13.1314 13.9173 14.3643 15.7849 15.5979 17.6521L17.0826 19.9011L17.1578 19.8516C17.823 19.419 18.5269 18.8032 19.084 18.1616C20.2699 16.7998 21.0342 15.1393 21.2908 13.3688C21.3659 12.8538 21.3751 12.7016 21.3751 12.0033C21.3751 11.3049 21.3659 11.1529 21.2908 10.6378C20.7813 7.11694 18.2757 4.15875 14.8777 3.06272C14.2783 2.86837 13.6405 2.73459 12.9257 2.65397C12.7497 2.63559 11.5382 2.61553 11.3861 2.63016M15.2241 8.301C15.312 8.34497 15.3835 8.42925 15.4092 8.51719C15.4238 8.56491 15.4275 9.58397 15.4238 11.8805L15.4183 15.176L14.8373 14.2852L14.2545 13.3944V10.9989C14.2545 9.45019 14.2618 8.57953 14.2728 8.53734C14.3021 8.43478 14.3662 8.35416 14.4543 8.30644C14.5294 8.268 14.5569 8.26425 14.8447 8.26425C15.116 8.26425 15.1636 8.268 15.2241 8.301Z" fill="black"/>
        </g>
        <defs>
        <clipPath id="clip0_9_33">
        <rect width="{{ $width }}" height="{{ $height }}" fill="white"/>
        </clipPath>
        </defs>
    </svg>




    @if ($workTooltip === 'true')
        <div id="{{ $data_tooltip_target }}" role="tooltip"
            class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            {{ $description_toll_tip }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    @endif
</div>
