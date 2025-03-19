@props([
    'width' => 24,
    'height' => 24,
    'description_toll_tip' => 'Typescript',
    'data_tooltip_target' => 'tooltip-svg-typescript',
    'workTooltip' => 'true',
])
<div data-tooltip-target="{{ $data_tooltip_target }}"
    {{ $attributes->merge([
        'class' =>
            'flex justify-center items-center relative p-1 block rounded-md' .
            ($workTooltip === 'true' ? 'hover:bg-gray-700' : ''),
    ]) }}>

    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_3_10)">
            <path
                d="M12 0C18.6274 0 24 5.37262 24 12C24 18.6274 18.6274 24 12 24C5.37262 24 0 18.6274 0 12C0 5.37262 5.37262 0 12 0Z"
                fill="#3178C6" />
            <path
                d="M13.1684 15.0668V17.4133C13.545 17.6089 13.9903 17.7556 14.5043 17.8534C15.0185 17.9511 15.5603 18 16.13 18C16.6851 18 17.2125 17.9462 17.7121 17.8387C18.2117 17.7312 18.6498 17.5539 19.0263 17.307C19.4028 17.0601 19.7009 16.7375 19.9206 16.339C20.1402 15.9406 20.2501 15.4481 20.25 14.8614C20.25 14.4361 20.1873 14.0633 20.0618 13.7431C19.9381 13.4257 19.7536 13.1355 19.5187 12.8888C19.2821 12.6395 18.9985 12.4158 18.6679 12.2179C18.3372 12.0199 17.9643 11.8329 17.5492 11.6569C17.245 11.5297 16.9723 11.4063 16.7309 11.2866C16.4897 11.1668 16.2845 11.0446 16.1154 10.9199C15.9465 10.7952 15.8162 10.6632 15.7245 10.5239C15.6328 10.3846 15.5869 10.2269 15.5869 10.0509C15.5869 9.88962 15.6279 9.74419 15.71 9.61462C15.7921 9.48506 15.9079 9.37381 16.0575 9.28088C16.2072 9.188 16.3906 9.11591 16.6078 9.06459C16.8251 9.01334 17.0664 8.98769 17.3319 8.98762C17.5251 8.98762 17.729 9.00231 17.9437 9.03169C18.1586 9.06094 18.3747 9.10612 18.5918 9.16725C18.8085 9.22829 19.0203 9.30551 19.2254 9.39825C19.4246 9.48768 19.6149 9.59572 19.7938 9.72094V7.52831C19.4414 7.39144 19.0565 7.29 18.6389 7.224C18.2214 7.158 17.7423 7.125 17.2016 7.125C16.6513 7.125 16.13 7.18488 15.6376 7.30463C15.1452 7.42444 14.712 7.61144 14.3378 7.86563C13.9637 8.11981 13.6681 8.44369 13.4509 8.83725C13.2337 9.23081 13.1251 9.70137 13.125 10.2489C13.125 10.948 13.3241 11.5444 13.7224 12.0382C14.1206 12.5319 14.7253 12.9499 15.5363 13.2922C15.8357 13.4158 16.1326 13.5454 16.4269 13.6808C16.7019 13.8079 16.9397 13.9399 17.14 14.0767C17.3403 14.2137 17.4984 14.3628 17.6143 14.5241C17.7302 14.6854 17.7881 14.8687 17.7881 15.0741C17.7892 15.2217 17.7517 15.367 17.6795 15.4957C17.6071 15.6253 17.4973 15.7378 17.35 15.8331C17.2028 15.9284 17.0193 16.0029 16.7997 16.0568C16.58 16.1105 16.323 16.1374 16.0286 16.1374C15.5266 16.1374 15.0293 16.0482 14.537 15.8697C14.0446 15.6913 13.5884 15.4236 13.1684 15.0668ZM9.16041 9.23831H12.1875V7.3125H3.75V9.23822H6.76238V17.8125H9.16031L9.16041 9.23831Z"
                fill="white" />
        </g>
        <defs>
            <clipPath id="clip0_3_10">
                <rect width="{{ $width }}" height="{{ $height }}" fill="white" rx="10"
                    ry="10" />
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
