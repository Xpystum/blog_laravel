@props(['width' => 24, 'height' => 24])
<div {{ $attributes->merge(['class' => 'flex justify-center items-center relative p-1 block rounded-md']) }} >
    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22.5 22.5H16.5V3H22.5V22.5ZM18 21H21V4.5H18V21ZM15 22.5H9V9H15V22.5ZM7.5 22.5H1.5V13.5H7.5V22.5Z" fill="#0D99FF"/>
        </svg>

</div>
