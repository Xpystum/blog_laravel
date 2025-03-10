@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'Vk', 'href' = '#'])
<a data-tooltip-target="tooltip-svg-vkontakte" href="{{ $href }}" class="relative p-1 block hover:bg-gray-700 rounded-md">
    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_1_59)">
        <path d="M12 0.48C5.6376 0.48 0.48 5.6376 0.48 12C0.48 18.3624 5.6376 23.52 12 23.52C18.3624 23.52 23.52 18.3624 23.52 12C23.52 5.6376 18.3624 0.48 12 0.48ZM16.4304 13.4772C16.4304 13.4772 17.4492 14.4828 17.7 14.9496C17.7072 14.96 17.7116 14.968 17.7132 14.9736C17.8148 15.144 17.84 15.2788 17.7888 15.378C17.7048 15.5436 17.4168 15.6252 17.3184 15.6324H15.5184C15.3936 15.6324 15.132 15.6 14.8152 15.3816C14.5716 15.2112 14.3316 14.9316 14.0976 14.6592C13.7484 14.2536 13.446 13.9032 13.1412 13.9032C13.1025 13.903 13.064 13.9091 13.0272 13.9212C12.7968 13.9956 12.5016 14.3244 12.5016 15.2004C12.5016 15.474 12.2856 15.6312 12.1332 15.6312H11.3088C11.028 15.6312 9.5652 15.5328 8.2692 14.166C6.6828 12.492 5.2548 9.1344 5.2428 9.1032C5.1528 8.886 5.3388 8.7696 5.5416 8.7696H7.3596C7.602 8.7696 7.6812 8.9172 7.7364 9.048C7.8012 9.2004 8.0388 9.8064 8.4288 10.488C9.0612 11.5992 9.4488 12.0504 9.7596 12.0504C9.81788 12.0497 9.87512 12.0349 9.9264 12.0072C10.332 11.7816 10.2564 10.3356 10.2384 10.0356C10.2384 9.9792 10.2372 9.3888 10.0296 9.1056C9.8808 8.9004 9.6276 8.8224 9.474 8.7936C9.53617 8.70781 9.61808 8.63825 9.7128 8.5908C9.9912 8.4516 10.4928 8.4312 10.9908 8.4312H11.268C11.808 8.4384 11.9472 8.4732 12.1428 8.5224C12.5388 8.6172 12.5472 8.8728 12.5124 9.7476C12.5016 9.996 12.4908 10.2768 12.4908 10.608L12.4872 10.8384C12.4752 11.2836 12.4608 11.7888 12.7752 11.9964C12.8157 12.0231 12.8634 12.0369 12.912 12.036C13.0212 12.036 13.35 12.036 14.2404 10.5084C14.514 10.0162 14.7526 9.50532 14.9544 8.9796C14.9724 8.9484 15.0252 8.8524 15.0876 8.8152C15.1341 8.79309 15.1849 8.78122 15.2364 8.7804H17.3736C17.6064 8.7804 17.766 8.8152 17.796 8.9052C17.8488 9.048 17.7864 9.4836 16.8108 10.8048L16.3752 11.3796C15.4908 12.5388 15.4908 12.5976 16.4304 13.4772Z" fill="#0D99FF"/>
        </g>
        <defs>
        <clipPath id="clip0_1_59">
        <rect width="24" height="24" fill="white"/>
        </clipPath>
        </defs>
    </svg>




    <div id="tooltip-svg-vkontakte" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
        {{ $description_toll_tip }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</a>
