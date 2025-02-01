<div class="mt-2 flex flex-col w-full h-full rounded bg-gray-50 dark:bg-gray-800 p-8">

    <div class="mb-3">
        <span class="text-white text-2md">Комментарии</span>
    </div >

    @php
        $accum = 1;
    @endphp

    @foreach ($post->comments as $comment)

        @if($accum % 2)
            @php $accum++ @endphp
            <x-comments.card-comment post="$post" dropdownDotsNumber="1" />
        @else
            @php $accum++ @endphp
            <x-comments.card-comment orientation="right" post="$post" dropdownDotsNumber="2"/>
        @endif

        {{-- {{ $comment->post_id; }} --}}
    @endforeach




</div>
