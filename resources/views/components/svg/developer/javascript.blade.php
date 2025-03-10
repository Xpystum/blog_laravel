@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'Typescript'])
<div data-tooltip-target="tooltip-svg-javascript" class="relative p-1 block hover:bg-gray-700 rounded-md">

    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_3_17)">
        <g clip-path="url(#clip1_3_17)">
        <path d="M18.375 0H5.625C2.5184 0 0 2.5184 0 5.625V18.375C0 21.4816 2.5184 24 5.625 24H18.375C21.4816 24 24 21.4816 24 18.375V5.625C24 2.5184 21.4816 0 18.375 0Z" fill="#F0DB4F"/>
        <path d="M5.00009 17.7963L5.13868 17.7076C6.06527 17.1151 7.22384 17.8479 8.32371 17.8479V17.8479C9.07319 17.8479 9.54573 17.5381 9.54573 16.333V9.27835C9.54573 8.64847 10.0563 8.13786 10.6862 8.13786V8.13786C11.3161 8.13786 11.8267 8.64847 11.8267 9.27835V16.3671C11.8267 18.8635 10.4419 19.9998 8.42146 19.9998C6.59681 19.9998 5.53768 19.0012 5 17.7961M13.6063 18.4001C13.2433 17.9486 13.4414 17.3081 13.9356 17.0057V17.0057C14.4769 16.6745 15.1563 16.8901 15.6329 17.3092C16.0243 17.6535 16.5143 17.8652 17.1712 17.8652C18.1164 17.8652 18.719 17.3659 18.719 16.6772C18.719 15.8508 18.0999 15.5581 17.0572 15.0762L16.4871 14.8178C14.8414 14.0776 13.7498 13.1479 13.7498 11.1852C13.7498 9.37738 15.0532 8 17.0899 8C18.2232 8 19.1077 8.32606 19.7978 9.13423C20.1516 9.54856 19.9894 10.1608 19.5386 10.4667V10.4667C19.0144 10.8225 18.3439 10.551 17.7836 10.2555C17.5812 10.1487 17.3543 10.1005 17.0899 10.1005C16.4218 10.1005 15.9982 10.5482 15.9982 11.1335C15.9982 11.8565 16.4218 12.1493 17.3993 12.597L17.9695 12.8552C19.9083 13.7334 21 14.6284 21 16.6427C21 18.8122 19.3871 20 17.2202 20C15.5664 20 14.3695 19.3493 13.6063 18.4001Z" fill="#323330"/>
        </g>
        </g>
        <defs>
        <clipPath id="clip0_3_17">
        <rect width="{{ $width }}" height="{{ $height }}" fill="white"/>
        </clipPath>
        <clipPath id="clip1_3_17">
        <rect width="{{ $width }}" height="{{ $height }}" rx="12" fill="white"/>
        </clipPath>
        </defs>
    </svg>


    <div id="tooltip-svg-javascript" role="tooltip"
        class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
        {{ $description_toll_tip }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>




