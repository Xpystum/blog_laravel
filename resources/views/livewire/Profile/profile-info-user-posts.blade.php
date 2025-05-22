<div>
    @forelse ($posts as $post)
        <x-post.card :post="$post" />

        @if (!$loop->last)
            <div class="w-full border-t border-gray-300 my-4"></div>
        @endif

    @empty
        <p>Нет данных для отображения</p>
    @endforelse
</div>
