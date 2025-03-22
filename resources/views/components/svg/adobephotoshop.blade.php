@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'Adobe Photoshop',
'workTooltip' => 'true', 'data_tooltip_target' => 'tooltip-svg-adobephotoshop'])
<div data-tooltip-target="{{ $data_tooltip_target }}" {{ $attributes->merge([
    'class' => ($workTooltip === 'true') ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : "flex justify-center items-center relative p-1 block rounded-md" ,
]) }}>
    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_1_82)">
            <path
                d="M20.498 0H4.082C1.82868 0 0.00199986 1.82668 0.00199986 4.08V19.8816C0.00199986 22.1349 1.82868 23.9616 4.082 23.9616H20.498C22.7513 23.9616 24.578 22.1349 24.578 19.8816V4.08C24.578 1.82668 22.7513 0 20.498 0Z"
                fill="#001E36" />
            <path
                d="M5.53582 16.8034V6.26851C5.53582 6.19165 5.56882 6.15318 5.6348 6.15312L5.73915 6.15283L5.91752 6.15091L6.16539 6.14602L6.99579 6.12845L7.88619 6.11194C8.19934 6.1065 8.50981 6.10374 8.81758 6.10368C9.65278 6.10368 10.3562 6.2081 10.9279 6.41693C11.4436 6.59124 11.9139 6.87848 12.3045 7.2577C12.6357 7.58634 12.8916 7.98292 13.0546 8.42006C13.2088 8.84548 13.287 9.29468 13.2855 9.74717C13.2855 10.6266 13.0822 11.352 12.6754 11.9234C12.2777 12.4808 11.7229 12.9072 11.0818 13.148L11.0268 13.1681C10.3574 13.4178 9.61611 13.5081 8.80309 13.5137L8.67675 13.5141L8.48926 13.5132L8.3947 13.5118L8.2893 13.5093L8.22574 13.5068L8.18715 13.5048L8.09221 13.5013L7.97614 13.4989L7.80142 13.4977L7.76254 13.4976V16.7868C7.76543 16.807 7.76359 16.8276 7.75715 16.8469C7.75071 16.8662 7.73986 16.8838 7.72546 16.8982C7.71106 16.9126 7.6935 16.9234 7.67417 16.9299C7.65485 16.9363 7.63429 16.9382 7.61413 16.9353H5.65131C5.57426 16.9353 5.53576 16.8914 5.53582 16.8034ZM7.76264 8.13149V11.5675C7.90536 11.5786 8.0372 11.5841 8.15816 11.584H8.70229C9.07743 11.5827 9.45039 11.5269 9.80946 11.4182L9.88107 11.3959C10.2078 11.2989 10.4997 11.11 10.7219 10.8517C10.9285 10.6081 11.0355 10.2724 11.043 9.84451L11.0434 9.79661C11.0521 9.4777 10.9691 9.16301 10.8043 8.88989C10.6311 8.62568 10.3807 8.4213 10.0872 8.30458C9.70397 8.15555 9.2946 8.08548 8.88363 8.09856L8.67454 8.09914L8.54264 8.10029L8.41678 8.10192L8.23918 8.10538L8.10958 8.10902L8.04229 8.11152L7.95234 8.11574L7.87573 8.12045L7.83205 8.1239L7.79432 8.12755L7.77771 8.12947L7.76264 8.13149ZM19.6599 10.9428C19.3723 10.795 19.0673 10.684 18.752 10.6123L18.679 10.5966C18.3321 10.517 17.978 10.4731 17.6221 10.4657L17.5332 10.4647C17.3246 10.459 17.1163 10.484 16.915 10.5389C16.7869 10.5675 16.673 10.6405 16.5934 10.7449C16.5396 10.8285 16.511 10.9258 16.511 11.0252C16.514 11.1216 16.5488 11.2143 16.6099 11.2889C16.6974 11.3912 16.8026 11.477 16.9205 11.5421L16.9562 11.561C17.1912 11.6875 17.4334 11.8004 17.6816 11.8989C18.2348 12.0842 18.7635 12.3361 19.256 12.6491C19.5915 12.8608 19.8691 13.1526 20.0639 13.4982C20.2276 13.8254 20.3096 14.1874 20.3029 14.5532C20.3127 15.0364 20.1746 15.5109 19.9072 15.9134C19.6209 16.322 19.2231 16.6395 18.7614 16.8283C18.2778 17.0408 17.684 17.1506 16.9799 17.1578L16.9067 17.1582C16.4703 17.1625 16.0344 17.1243 15.6054 17.0441L15.5136 17.0263C15.1523 16.96 14.8007 16.8493 14.4667 16.6965C14.4331 16.6792 14.4047 16.6533 14.3844 16.6214C14.3642 16.5895 14.3527 16.5528 14.3513 16.5151V14.7181C14.3493 14.7007 14.3521 14.683 14.3594 14.6671C14.3667 14.6511 14.3781 14.6374 14.3926 14.6274C14.4067 14.6194 14.423 14.6159 14.4392 14.6173C14.4554 14.6188 14.4708 14.6252 14.4832 14.6357C14.8777 14.8682 15.3059 15.0379 15.7526 15.1385C16.1464 15.2373 16.5503 15.2898 16.9562 15.2952C17.3408 15.2952 17.6238 15.2457 17.8052 15.1468C17.8871 15.1092 17.9564 15.0488 18.0046 14.9727C18.0529 14.8966 18.0781 14.8082 18.0773 14.7181C18.0773 14.5754 17.9948 14.438 17.83 14.306C17.7608 14.2507 17.6617 14.1906 17.5327 14.1255L17.4709 14.0952L17.4051 14.0642L17.3705 14.0484L17.2981 14.0164L17.2604 14.0001L17.1817 13.967L17.1407 13.9502L17.0556 13.9162L17.0115 13.8989L16.92 13.8636L16.8243 13.8278C16.3065 13.6478 15.8157 13.3982 15.3652 13.086C15.0429 12.8619 14.7775 12.5654 14.5904 12.2204C14.4283 11.8955 14.3463 11.5366 14.3513 11.1735C14.3503 10.7373 14.4701 10.3093 14.6975 9.93706C14.9567 9.52714 15.3288 9.20074 15.7691 8.99741C16.2527 8.75574 16.8571 8.63482 17.5826 8.63462C18.0075 8.63121 18.432 8.66154 18.8521 8.72534C19.1563 8.76397 19.4537 8.84441 19.7359 8.96438C19.7813 8.97744 19.8178 9.01094 19.8347 9.0551C19.846 9.09533 19.8514 9.1369 19.8512 9.17875V10.8439C19.8536 10.8832 19.8347 10.921 19.8018 10.9428C19.7798 10.9537 19.7555 10.9594 19.7309 10.9594C19.7062 10.9594 19.682 10.9537 19.6599 10.9428Z"
                fill="#31A8FF" />
        </g>
        <defs>
            <clipPath id="clip0_1_82">
                <rect width="24.58" height="24" fill="white" />
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
