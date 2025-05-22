@php
    $status = $likeModel?->status ?? null;
@endphp
<div class="flex flex row">

    <button {{ $disableHeartButton ? 'disabled' : '' }} {{ $disableHeartButton ? 'disabled' : '' }} id="like-button"
        wire:loading.attr="disabled" wire:click.throttle.2000ms="setLike" wire:click="$refresh" type="button"
        class="{{ $buttonClass ? $buttonClass : '' }}">
        <x-icon-heart
            class="svg-icon-heart
        {{ $disableHeartButton ? 'icon-blade-disable-hover' : 'custom-icon-blade-heart' }}
        {{ $status ? 'custom-icon-blade-heart-active' : '' }} " />
    </button>

    <span class="flex items-center ml-1 text-white">{{ $likesCount }}</span>

</div>


@pushOnce('scripts')
    @vite('resources/js/icons/like-heart-icons.js')
@endPushOnce
