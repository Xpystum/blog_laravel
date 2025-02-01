<div class="mt-2 flex flex-col w-full h-full rounded bg-gray-50 dark:bg-gray-800 p-8">

    <div class="mb-3">
        <span class="text-white text-2md">Комментарии</span>
    </div >


    {{-- @foreach ($post->comments as $comment)

        @if($accum % 2)
            @php $accum++ @endphp
            <x-comments.card-comment post="$post" dropdownDotsNumber="1" />
        @else
            @php $accum++ @endphp
            <x-comments.card-comment orientation="right" post="$post" dropdownDotsNumber="2"/>
        @endif

    @endforeach --}}


    @foreach ($post->comments as $comment)
        <x-comments.card-comment
            :post="$post"
            :dropdownDotsNumber="$comment->id"
            :orientation="$loop->even ? 'right' : 'left' "
        />
    @endforeach




</div>
