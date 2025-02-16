{{-- <div>
    <button wire:click="increment">+</button>
    <div>{{ $count }}</div>
    <button x-on:click="sendRequestHeart" type="button" class="p-1 ml-2">
        <x-icon-heart class="svg-icon-heart custom-icon-blade-heart" />

    </button>
</div> --}}

<div style="text-align: center">
    <button wire:loading.attr="disabled" wire:click="increment">+</button>
    {{-- <h1>{{ $count }}</h1> --}}
</div>

