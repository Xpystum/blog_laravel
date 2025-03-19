@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'Adobe After Affects',
'data_tooltip_target' => 'tooltip-svg-adobeafteraffects', 'workTooltip' => 'true'])
<div data-tooltip-target="{{ $data_tooltip_target }}" {{ $attributes->merge([
    'class' => 'flex justify-center items-center relative p-1 block rounded-md' . (($workTooltip === 'true') ? "hover:bg-gray-700" : "")
]) }}>
    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_1_91)">
        <path d="M20.498 0H4.082C1.82868 0 0.00199986 1.82668 0.00199986 4.08V19.8816C0.00199986 22.1349 1.82868 23.9616 4.082 23.9616H20.498C22.7513 23.9616 24.578 22.1349 24.578 19.8816V4.08C24.578 1.82668 22.7513 0 20.498 0Z" fill="#00005B"/>
        <path d="M9.87493 14.336H6.06651L5.2916 16.7476C5.28167 16.7889 5.25842 16.8258 5.22545 16.8527C5.19247 16.8795 5.1516 16.8948 5.1091 16.8961L3.16491 16.896C3.05483 16.896 3.01637 16.8355 3.04952 16.7146L6.34683 7.25769L6.37976 7.15834L6.3907 7.12435L6.41278 7.05331C6.42373 7.01664 6.43467 6.97776 6.44571 6.93562C6.48891 6.71568 6.51099 6.49209 6.51166 6.26793C6.50944 6.25226 6.51089 6.23629 6.5159 6.22127C6.52091 6.20625 6.52934 6.19261 6.54054 6.18142C6.55173 6.17022 6.56537 6.16179 6.58039 6.15678C6.59541 6.15176 6.61138 6.15032 6.62706 6.15254H9.24843C9.32523 6.15254 9.3692 6.18003 9.38034 6.23501L13.1227 16.7312C13.1557 16.8411 13.1227 16.8961 13.0238 16.896H10.8805C10.8437 16.9 10.8067 16.8905 10.7764 16.8693C10.7461 16.8481 10.7245 16.8166 10.7157 16.7806L9.87493 14.336ZM6.66008 12.3026H9.26494L9.22779 12.18L9.16818 11.9859L9.08091 11.7079L8.91339 11.183L8.75384 10.6787L8.45701 9.73891C8.375 9.4795 8.29627 9.21906 8.22085 8.95766L8.13656 8.66045L8.04555 8.33472L7.96242 8.03261H7.9459C7.86339 8.42832 7.76293 8.82009 7.64485 9.20669L7.53349 9.56409L7.26565 10.4281L7.1299 10.8683C7.10539 10.9477 7.08091 11.0263 7.05646 11.104L6.9835 11.3342L6.91093 11.5591L6.83874 11.7783L6.76693 11.9921C6.73115 12.0977 6.69554 12.2012 6.66008 12.3026ZM19.1898 13.3974H15.942C15.9817 13.7187 16.0885 14.0281 16.2553 14.3056C16.4396 14.5805 16.7004 14.7954 17.0053 14.9239C17.4186 15.1028 17.8657 15.1904 18.316 15.1808C18.6733 15.1739 19.0292 15.1348 19.3794 15.064C19.6926 15.0218 19.9996 14.9418 20.2936 14.8258C20.3486 14.7819 20.3761 14.8094 20.3762 14.9081V16.4744C20.3789 16.5171 20.3703 16.5597 20.3513 16.598C20.3325 16.628 20.3072 16.6533 20.2772 16.6722C19.951 16.8167 19.6078 16.9189 19.2558 16.9765C18.7775 17.0663 18.2914 17.1077 17.8049 17.1001C17.0488 17.1001 16.4115 16.9867 15.8929 16.7598L15.843 16.7374C15.3444 16.5178 14.9041 16.1848 14.5571 15.7647C14.233 15.369 13.9919 14.912 13.8482 14.4211C13.7059 13.9365 13.6338 13.4341 13.634 12.9291C13.6324 12.3776 13.7187 11.8295 13.8896 11.3052C14.0541 10.7937 14.3142 10.3182 14.6561 9.90384C14.9935 9.49439 15.4152 9.16257 15.8926 8.93107C16.3761 8.69491 16.9477 8.61014 17.6072 8.61014C18.1541 8.59645 18.6973 8.7034 19.1982 8.92339C19.6193 9.10297 19.99 9.38297 20.278 9.73891C20.5482 10.0874 20.7547 10.4809 20.888 10.9012C21.0178 11.3062 21.0845 11.7288 21.0858 12.1542C21.0858 12.3961 21.0776 12.6159 21.0611 12.8137L21.0464 12.983L21.0311 13.1437L21.022 13.2252L21.0199 13.2423C21.0156 13.2787 20.9981 13.3122 20.9708 13.3365C20.9434 13.3608 20.9081 13.3742 20.8715 13.3742L20.8263 13.3752L20.77 13.3781L20.7261 13.3812L20.6236 13.39L20.5335 13.3989C20.509 13.4015 20.4836 13.4039 20.4572 13.4061L20.3755 13.4125L20.2882 13.4183L20.1956 13.4231L20.0975 13.4272L20.0463 13.429L19.94 13.4318C19.8349 13.4344 19.7272 13.4279 19.6167 13.4198L19.4491 13.4076C19.3628 13.4012 19.2763 13.3978 19.1898 13.3974ZM15.9421 11.8955H18.1872L18.3784 11.8942L18.5084 11.8924L18.5926 11.8905L18.6871 11.8872C18.7716 11.8788 18.8532 11.8517 18.9261 11.808V11.7091C18.9229 11.5802 18.9007 11.4524 18.8602 11.3299C18.7713 11.0486 18.5925 10.8043 18.3512 10.6346C18.11 10.4648 17.8197 10.3789 17.5249 10.3901C17.2474 10.3733 16.9711 10.4377 16.7295 10.5753C16.488 10.7129 16.2917 10.9178 16.1647 11.165C16.0517 11.395 15.9765 11.6415 15.9421 11.8955Z" fill="#9999FF"/>
        </g>
        <defs>
        <clipPath id="clip0_1_91">
        <rect width="24.58" height="24" fill="white"/>
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
