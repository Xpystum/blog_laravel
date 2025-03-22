@props(['width' => 24, 'height' => 24, 'description_toll_tip' => 'AdobeXD', 'data_tooltip_target' => 'tooltip-svg-adobexd', 'workTooltip' => 'true'])
<div data-tooltip-target="{{ $data_tooltip_target }}"
{{ $attributes->merge([
    'class' => ($workTooltip === 'true') ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : "flex justify-center items-center relative p-1 block rounded-md" ,
]) }} >
    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_1_76)">
            <path
                d="M20.498 0H4.082C1.82868 0 0.00199986 1.82668 0.00199986 4.08V19.8816C0.00199986 22.1349 1.82868 23.9616 4.082 23.9616H20.498C22.7513 23.9616 24.578 22.1349 24.578 19.8816V4.08C24.578 1.82668 22.7513 0 20.498 0Z"
                fill="#470137" />
            <path
                d="M12.9215 6.30144L9.85496 11.3628L13.1358 16.7374C13.1569 16.775 13.1627 16.8192 13.1523 16.8611C13.1472 16.8789 13.1362 16.8833 13.1194 16.884L13.1008 16.8837L13.0782 16.8831C13.0659 16.8831 13.0521 16.8837 13.0369 16.8862H10.6714L10.625 16.8854C10.4975 16.8821 10.4056 16.8638 10.3496 16.7703C10.1308 16.3439 9.91094 15.9181 9.69013 15.4927C9.49261 15.1133 9.28971 14.7367 9.08149 14.363L8.98952 14.1985C8.74047 13.7559 8.49591 13.3107 8.25589 12.8631H8.23938C8.01772 13.306 7.78963 13.7457 7.55518 14.182C7.3187 14.6217 7.08514 15.0586 6.85448 15.4927C6.62365 15.927 6.38735 16.3585 6.14562 16.7868C6.10674 16.8742 6.04213 16.8924 5.95218 16.8954L5.91474 16.896H3.65614L3.64635 16.8963L3.6141 16.8992C3.59614 16.9002 3.58539 16.8964 3.58194 16.8693C3.57579 16.8291 3.5846 16.7881 3.6067 16.7539L6.78853 11.5277L3.68907 6.28512C3.65618 6.24134 3.65067 6.20563 3.67256 6.17798C3.68473 6.1639 3.7 6.15284 3.71718 6.14567C3.73436 6.13851 3.75297 6.13544 3.77154 6.1367H6.09608C6.14677 6.13396 6.19744 6.14241 6.2445 6.16147C6.28386 6.18384 6.31774 6.21485 6.34338 6.25219C6.5412 6.69187 6.76104 7.13149 7.0029 7.57104C7.24285 8.00775 7.4874 8.44192 7.73653 8.87347C7.98183 9.29834 8.21008 9.73283 8.42072 10.1759H8.43723C8.6531 9.73293 8.87569 9.29327 9.10491 8.85706C9.33006 8.42838 9.56085 7.99696 9.79726 7.56278C10.0306 7.13424 10.2587 6.70285 10.4815 6.2687C10.4941 6.228 10.5168 6.19114 10.5474 6.16147C10.5881 6.14084 10.6339 6.13225 10.6793 6.1367H12.839C12.8589 6.13175 12.8798 6.13338 12.8987 6.14135C12.9175 6.14932 12.9333 6.16319 12.9435 6.18088C12.9538 6.19857 12.9581 6.21913 12.9557 6.23945C12.9533 6.25977 12.9444 6.27876 12.9302 6.29357L12.9215 6.30144ZM17.7666 17.0988L17.6529 17.1001C16.8941 17.1117 16.1422 16.954 15.452 16.6385C14.8089 16.3409 14.2714 15.8551 13.9105 15.2454C13.5465 14.6409 13.3598 13.8878 13.3503 12.986L13.3499 12.9126C13.3437 12.1559 13.5371 11.411 13.9106 10.7529C14.2843 10.1015 14.8292 9.5648 15.4861 9.20093L15.5427 9.17021C16.2569 8.7745 17.1197 8.57664 18.131 8.57664L18.1752 8.57712L18.2257 8.57875L18.2823 8.58125L18.3453 8.5849L18.4511 8.59238L18.5709 8.60198L18.6585 8.60966V5.36179C18.6585 5.28493 18.6915 5.24646 18.7574 5.2464H20.8348C20.8482 5.24447 20.8619 5.2457 20.8748 5.24999C20.8876 5.25428 20.8993 5.2615 20.9089 5.2711C20.9185 5.2807 20.9258 5.2924 20.9301 5.30527C20.9343 5.31815 20.9356 5.33185 20.9336 5.34528V15.0888C20.9336 15.2524 20.94 15.4286 20.9527 15.6172L20.9834 16.0449L20.9997 16.2923C21.0017 16.3265 20.9934 16.3606 20.9757 16.39C20.958 16.4194 20.9319 16.4429 20.9007 16.4572C20.3648 16.6807 19.8066 16.8464 19.2356 16.9517C18.7508 17.0412 18.2595 17.0904 17.7666 17.0988ZM18.6585 15.0558V10.555C18.5694 10.5309 18.4785 10.5143 18.3866 10.5056C18.2743 10.4942 18.1614 10.4887 18.0486 10.4891C17.6485 10.485 17.2531 10.5754 16.8945 10.7529C16.5453 10.9266 16.2471 11.1879 16.029 11.5113C15.8113 11.8296 15.6988 12.2453 15.6914 12.7583L15.691 12.8137C15.683 13.173 15.7417 13.5308 15.8641 13.8687C15.9638 14.1411 16.1213 14.3886 16.3258 14.5942C16.5216 14.7834 16.7586 14.9245 17.0182 15.0063C17.2924 15.0951 17.579 15.1396 17.8672 15.1383C18.021 15.1383 18.1639 15.1328 18.2959 15.1217C18.4011 15.1138 18.5055 15.0965 18.6077 15.0699L18.6585 15.0558Z"
                fill="#FF61F6" />
        </g>
        <defs>
            <clipPath id="clip0_1_76">
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
