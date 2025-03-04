@php
    $status = $likeModel?->status ?? null ;

@endphp
<div>
    <button {{ $disableHeartButton ? 'disabled' : '' }} {{ $disableHeartButton ? 'disabled' : '' }} id="like-button" wire:loading.attr="disabled" wire:click.throttle.2000ms="setLike" wire:click="$refresh" type="button" class="p-1 ml-2">
        <x-icon-heart class="svg-icon-heart
            {{ $disableHeartButton ? 'icon-blade-disable-hover' : 'custom-icon-blade-heart' }}
            {{ $status ? 'custom-icon-blade-heart-active' : '' }} "
        />
    </button>
</div>

@pushOnce('scripts')
    @vite('resources/js/icons/like-heart-icons.js')
@endPushOnce
