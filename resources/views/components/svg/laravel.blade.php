@props([
    'width' => 24,
    'height' => 24,
    'description_toll_tip' => 'Laravel',
    'data_tooltip_target' => 'tooltip-svg-laravel',
    'workTooltip' => 'true',
])
<div data-tooltip-target="{{ $data_tooltip_target }}" data-tooltip-trigger="hover"
    {{ $attributes->merge([
        'class' => ($workTooltip === 'true') ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : "flex justify-center items-center relative p-1 block rounded-md" ,
    ]) }}>

    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_4_54)">
            <path
                d="M23.9722 6.84C23.9662 6.8175 23.955 6.798 23.9468 6.77625C23.9326 6.73582 23.9151 6.69668 23.8942 6.65925C23.8571 6.60541 23.8166 6.55405 23.7728 6.5055C23.7518 6.48626 23.7298 6.46823 23.7067 6.4515C23.6869 6.4334 23.6661 6.41637 23.6445 6.4005L23.6115 6.3855L23.5853 6.3675L19.0853 4.1175C18.9812 4.06548 18.8664 4.0384 18.75 4.0384C18.6336 4.0384 18.5188 4.06548 18.4147 4.1175L13.9147 6.3675L13.8885 6.3855L13.8555 6.4005C13.8339 6.41637 13.8131 6.4334 13.7933 6.4515C13.7377 6.4898 13.6901 6.53843 13.653 6.59475C13.6359 6.61538 13.6198 6.63691 13.605 6.65925C13.5844 6.6967 13.5671 6.73585 13.5532 6.77625C13.5457 6.798 13.5338 6.8175 13.5278 6.84C13.5096 6.90471 13.5003 6.97156 13.5 7.03875V11.0752L10.5 12.5752V4.03875C10.4997 3.97156 10.4904 3.90471 10.4723 3.84C10.4663 3.8175 10.455 3.798 10.4467 3.77625C10.4326 3.73582 10.4151 3.69668 10.3943 3.65925C10.3797 3.63693 10.3639 3.61539 10.347 3.59475C10.3099 3.53843 10.2623 3.4898 10.2068 3.4515C10.1869 3.4334 10.1661 3.41637 10.1445 3.4005L10.1115 3.3855L10.0852 3.3675L5.58525 1.1175C5.48115 1.06548 5.36637 1.0384 5.25 1.0384C5.13363 1.0384 5.01885 1.06548 4.91475 1.1175L0.41475 3.3675L0.3885 3.3855L0.3555 3.4005C0.333852 3.41637 0.313072 3.4334 0.29325 3.4515C0.270244 3.46823 0.248208 3.48626 0.22725 3.5055C0.199972 3.53326 0.174896 3.5631 0.15225 3.59475C0.135364 3.61539 0.119592 3.63693 0.105 3.65925C0.0844491 3.69671 0.0671362 3.73585 0.05325 3.77625C0.04575 3.798 0.03375 3.8175 0.02775 3.84C0.00963847 3.90471 0.000304942 3.97156 0 4.03875L0 18.2887C7.43615e-05 18.428 0.0389123 18.5645 0.112164 18.6829C0.185416 18.8013 0.290189 18.897 0.41475 18.9592L4.91475 21.2092L9.41475 23.4592C9.42525 23.4645 9.43725 23.463 9.44925 23.4675C9.54269 23.514 9.64563 23.5382 9.75 23.5382C9.85437 23.5382 9.95731 23.514 10.0508 23.4675C10.062 23.463 10.0747 23.4645 10.0852 23.46L19.0853 18.96C19.2099 18.8977 19.3148 18.8019 19.388 18.6833C19.4613 18.5648 19.5001 18.4281 19.5 18.2887V14.2522L23.5853 12.2092C23.7098 12.147 23.8146 12.0513 23.8878 11.9329C23.9611 11.8145 23.9999 11.678 24 11.5387V7.03875C23.9997 6.97156 23.9904 6.90471 23.9722 6.84ZM6.927 16.0387L10.0852 14.4592H10.086L14.25 12.3772L17.073 13.7887L9.75 17.4502L6.927 16.0387ZM18 9.75225V12.5752L15 11.0752V8.25225L18 9.75225ZM18.75 5.62725L21.573 7.03875L18.75 8.45025L15.927 7.03875L18.75 5.62725ZM6 14.8252V6.75225L9 5.25225V13.3252L6 14.8252ZM5.25 2.62725L8.073 4.03875L5.25 5.45025L2.427 4.03875L5.25 2.62725ZM1.5 5.25225L4.5 6.75225V19.3252L1.5 17.8252V5.25225ZM6 17.2522L9 18.7522V21.5752L6 20.0752V17.2522ZM18 17.8252L10.5 21.5752V18.7522L18 15.0022V17.8252ZM22.5 11.0752L19.5 12.5752V9.75225L22.5 8.25225V11.0752Z"
                fill="#FF5252" />
        </g>
        <defs>
            <clipPath id="clip0_4_54">
                <rect width="{{ $width }}" height="{{ $height }}" fill="white" />
            </clipPath>
        </defs>
    </svg>


    @if ($workTooltip === 'true')
        <div id="{{ $data_tooltip_target }}" role="tooltip"
            class="text-center absolute z-10 invisible inline-block px-3 py-2
            text-sm font-medium text-white transition-opacity duration-300 bg-gray-900
            rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
            {{ $description_toll_tip }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    @endif

</div>
