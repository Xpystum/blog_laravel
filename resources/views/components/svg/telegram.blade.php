@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'Telegram', 'href' => '#'])
<a data-tooltip-target="tooltip-svg-telegram" href="{{ $href }}" class="relative p-1 block hover:bg-gray-700 rounded-md">
    <svg data-tooltip-trigger="hover" width="{{ $width }}" height="{{ $height }}" viewBox="0 0 16 16" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_238_28)">
            <path
                d="M8 0C5.87875 0 3.8425 0.843375 2.34375 2.34313C0.843465 3.84348 0.000429311 5.87823 0 8C0 10.1209 0.84375 12.1571 2.34375 13.6569C3.8425 15.1566 5.87875 16 8 16C10.1213 16 12.1575 15.1566 13.6562 13.6569C15.1562 12.1571 16 10.1209 16 8C16 5.87913 15.1562 3.84288 13.6562 2.34313C12.1575 0.843375 10.1213 0 8 0Z"
                fill="url(#paint0_linear_238_28)" />
            <path
                d="M3.62155 7.9155C5.95405 6.8995 7.50906 6.22966 8.28656 5.906C10.5091 4.98187 10.9703 4.82137 11.2716 4.81593C11.3378 4.81487 11.4853 4.83125 11.5816 4.90906C11.6616 4.97468 11.6841 5.06343 11.6953 5.12575C11.7053 5.188 11.7191 5.32987 11.7078 5.44062C11.5878 6.70562 11.0666 9.77537 10.8016 11.1922C10.6903 11.7917 10.4691 11.9927 10.2553 12.0124C9.79031 12.0551 9.43781 11.7054 8.98781 11.4105C8.28406 10.9489 7.88656 10.6616 7.20281 10.2112C6.4128 9.69075 6.92531 9.40462 7.37531 8.93712C7.49281 8.81475 9.54031 6.95287 9.57906 6.784C9.58406 6.76287 9.58906 6.68412 9.54156 6.64262C9.49531 6.601 9.42656 6.61525 9.37656 6.6265C9.30531 6.6425 8.18156 7.386 6.00155 8.85687C5.6828 9.07612 5.39405 9.183 5.13405 9.17737C4.84905 9.17125 4.29905 9.01587 3.8903 8.88312C3.3903 8.72025 2.99155 8.63412 3.02655 8.3575C3.04405 8.2135 3.2428 8.06612 3.62155 7.9155Z"
                fill="white" />
        </g>
        <defs>
            <linearGradient id="paint0_linear_238_28" x1="800" y1="0" x2="800" y2="1600"
                gradientUnits="userSpaceOnUse">
                <stop stop-color="#2AABEE" />
                <stop offset="1" stop-color="#229ED9" />
            </linearGradient>
            <clipPath id="clip0_238_28">
                <rect width="16" height="16" fill="white" />
            </clipPath>
        </defs>
    </svg>

    <div id="tooltip-svg-telegram" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
        {{ $description_toll_tip }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</a>
