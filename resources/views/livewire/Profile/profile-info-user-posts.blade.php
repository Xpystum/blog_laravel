<div>
    @forelse ($posts as $post)

        <x-post.card wire:key="{{ $post->id }}" :post="$post" :profile="$profile" />

        @if (!$loop->last)
            <div class="w-full border-t border-gray-300 my-4"></div>
        @endif

    @empty
        <p>Нет данных для отображения</p>
    @endforelse

    <div class="flex justify-center">
        <button
            wire:click="addLoadPost"
            wire:loading.attr="disabled"
            {{ $hasButtonMorePost ? '' : 'disabled' }}
            type="button"
            class="mt-5 w-1/3 text-white bg-blue-700
            hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
            font-medium rounded-lg text-sm px-5 py-2
            dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none
            dark:focus:ring-blue-800 {{ $hasButtonMorePost ? '' : 'btn-disabled opacity-50' }}">
        Показать больше
    </button>
    </div>

</div>
