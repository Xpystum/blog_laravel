@php
    $status = $likeModel?->status ?? null ;
@endphp
<div>
    <button id="like-button" wire:loading.attr="disabled" wire:click.throttle.2000ms="setLike" wire:click="$refresh" type="button" class="p-1 ml-2">
        <x-icon-heart class="svg-icon-heart custom-icon-blade-heart {{ $status ? 'custom-icon-blade-heart-active' : '' }} " />
    </button>
</div>

@pushOnce('scripts')
    @vite('resources/js/icons/like-heart-icons.js')
@endPushOnce
