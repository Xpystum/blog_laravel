@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'NextJs'])
<div data-tooltip-target="tooltip-svg-nextjs" class="relative p-1 block hover:bg-gray-700 rounded-md">

    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none"
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
    </svg>


    <div id="tooltip-svg-nextjs" role="tooltip"
        class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
        {{ $description_toll_tip }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>
