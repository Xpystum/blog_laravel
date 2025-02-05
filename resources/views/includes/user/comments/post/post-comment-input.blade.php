<x-form class="w-full mt-8" method="POST" action="{{ route('users.posts.comments.store', ['post' => $post->id]) }}">

    <x-comments.post.post-comment-input />

</x-form>
