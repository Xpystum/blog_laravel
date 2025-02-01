<div class="mt-2 flex flex-col w-full h-full rounded bg-gray-50 dark:bg-gray-800 p-8">

    <div class="mb-3">
        <span class="text-white text-2md">Комментарии</span>
    </div >

    @foreach ($post->comments as $comment)
        <x-comments.card-comment
            :comment="$comment"
            :dropdownDotsNumber="$comment->id"
            :orientation="$loop->even ? 'right' : 'left' "
        />
    @endforeach

</div>
