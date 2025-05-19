@props(['width' => 24, 'height' => 24, 'workTooltip' => true])
<div {{
    $attributes->merge([

        'class' => ($workTooltip) ? "flex justify-center items-center relative p-1 block rounded-md hover:bg-gray-700" : 'flex justify-center items-center relative p-1 block rounded-md'

    ])

}}>
    <svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9 11L12 14L20 6" stroke="#0D99FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M20 12V18C20 18.5304 19.7893 19.0391 19.4142 19.4142C19.0391 19.7893 18.5304 20 18 20H6C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18V6C4 5.46957 4.21071 4.96086 4.58579 4.58579C4.96086 4.21071 5.46957 4 6 4H15" stroke="#0D99FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>


</div>
