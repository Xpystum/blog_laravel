@props([
    'width' => 24,
    'height' => 24,
    'description_toll_tip' => 'SQL',
    'data_tooltip_target' => 'tooltip-svg-sql',
    'workTooltip' => 'true',
])
<div data-tooltip-target="{{ $data_tooltip_target }}"
    {{ $attributes->merge([
        'class' => ($workTooltip === 'true') ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : "flex justify-center items-center relative p-1 block rounded-md" ,
    ]) }}>

    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M4.5 11.25C4.69891 11.25 4.88968 11.171 5.03033 11.0303C5.17098 10.8897 5.25 10.6989 5.25 10.5V3.75H13.5V8.25C13.5 8.44891 13.579 8.63968 13.7197 8.78033C13.8603 8.92098 14.0511 9 14.25 9H18.75V10.5C18.75 10.6989 18.829 10.8897 18.9697 11.0303C19.1103 11.171 19.3011 11.25 19.5 11.25C19.6989 11.25 19.8897 11.171 20.0303 11.0303C20.171 10.8897 20.25 10.6989 20.25 10.5V8.25C20.2501 8.15148 20.2307 8.05391 20.1931 7.96286C20.1555 7.87182 20.1003 7.78908 20.0306 7.71938L14.7806 2.46938C14.7109 2.39975 14.6282 2.34454 14.5371 2.3069C14.4461 2.26926 14.3485 2.24992 14.25 2.25H5.25C4.85218 2.25 4.47064 2.40804 4.18934 2.68934C3.90804 2.97064 3.75 3.35218 3.75 3.75V10.5C3.75 10.6989 3.82902 10.8897 3.96967 11.0303C4.11032 11.171 4.30109 11.25 4.5 11.25ZM15 4.81031L17.6897 7.5H15V4.81031ZM21.375 19.5C21.375 19.6989 21.296 19.8897 21.1553 20.0303C21.0147 20.171 20.8239 20.25 20.625 20.25H18C17.8011 20.25 17.6103 20.171 17.4697 20.0303C17.329 19.8897 17.25 19.6989 17.25 19.5V14.25C17.25 14.0511 17.329 13.8603 17.4697 13.7197C17.6103 13.579 17.8011 13.5 18 13.5C18.1989 13.5 18.3897 13.579 18.5303 13.7197C18.671 13.8603 18.75 14.0511 18.75 14.25V18.75H20.625C20.8239 18.75 21.0147 18.829 21.1553 18.9697C21.296 19.1103 21.375 19.3011 21.375 19.5ZM8.60812 18.4041C8.57889 18.6909 8.48647 18.9677 8.3375 19.2146C8.18853 19.4615 7.98672 19.6723 7.74656 19.8319C7.26 20.1562 6.65625 20.25 6.10687 20.25C5.62774 20.2475 5.15084 20.1845 4.6875 20.0625C4.4982 20.0071 4.33836 19.8793 4.24261 19.7068C4.14685 19.5344 4.12289 19.3311 4.1759 19.1412C4.22892 18.9512 4.35465 18.7897 4.52585 18.6918C4.69706 18.5938 4.89997 18.5672 5.09062 18.6178C5.50125 18.7303 6.49219 18.8709 6.92344 18.5841C7.00687 18.5287 7.095 18.4416 7.12406 18.2156C7.15687 17.9653 7.0575 17.8313 5.92594 17.5041C5.04937 17.2509 3.58219 16.8263 3.76969 15.3375C3.79887 15.0563 3.88959 14.7849 4.03541 14.5427C4.18123 14.3005 4.37857 14.0933 4.61344 13.9359C5.72344 13.1859 7.49344 13.6256 7.69125 13.6772C7.78654 13.7023 7.87595 13.7459 7.95438 13.8056C8.0328 13.8653 8.09871 13.9398 8.14833 14.025C8.19795 14.1101 8.23032 14.2042 8.24358 14.3018C8.25684 14.3995 8.25074 14.4988 8.22562 14.5941C8.20051 14.6894 8.15687 14.7788 8.0972 14.8572C8.03753 14.9356 7.963 15.0015 7.87786 15.0511C7.79272 15.1008 7.69864 15.1331 7.60099 15.1464C7.50334 15.1597 7.40404 15.1536 7.30875 15.1284C6.88781 15.0187 5.88187 14.8884 5.45062 15.1809C5.3941 15.2191 5.34756 15.2702 5.31493 15.3301C5.2823 15.39 5.26453 15.4568 5.26312 15.525C5.25187 15.6094 5.25 15.6263 5.36812 15.7031C5.58469 15.8428 5.97187 15.9544 6.34781 16.0631C7.26562 16.3284 8.81812 16.7812 8.60812 18.4041ZM15.2644 18.7069C15.5842 18.1495 15.7517 17.5177 15.75 16.875C15.75 15.0141 14.4047 13.5 12.75 13.5C11.0953 13.5 9.75 15.0141 9.75 16.875C9.75 18.7359 11.0953 20.25 12.75 20.25C13.2798 20.248 13.7976 20.0923 14.2406 19.8019L14.4694 20.0306C14.6101 20.1712 14.8009 20.2502 14.9999 20.2501C15.1988 20.25 15.3895 20.1709 15.5302 20.0302C15.6708 19.8894 15.7497 19.6986 15.7496 19.4997C15.7495 19.3007 15.6704 19.11 15.5297 18.9694L15.2644 18.7069ZM12.75 18.75C11.9231 18.75 11.25 17.9062 11.25 16.875C11.25 15.8438 11.9231 15 12.75 15C13.5769 15 14.25 15.8438 14.25 16.875C14.2501 17.114 14.2128 17.3516 14.1394 17.5791L14.0297 17.4694C13.96 17.3998 13.8773 17.3445 13.7863 17.3069C13.6952 17.2692 13.5977 17.2499 13.4992 17.2499C13.3003 17.25 13.1095 17.3291 12.9689 17.4698C12.8283 17.6106 12.7494 17.8014 12.7494 18.0003C12.7495 18.1993 12.8286 18.39 12.9694 18.5306L13.1269 18.6872C13.0053 18.7278 12.8781 18.749 12.75 18.75Z"
            fill="#0D99FF" />
    </svg>


    @if ($workTooltip === 'true')
        <div id="{{ $data_tooltip_target }}" role="tooltip"
            class="text-center absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            {{ $description_toll_tip }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    @endif
</div>
