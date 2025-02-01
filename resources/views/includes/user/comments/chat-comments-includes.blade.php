<div class="mt-2 flex flex-col w-full h-full rounded bg-gray-50 dark:bg-gray-800 p-8">

    <div class="mb-3">
        <span class="text-white text-2md">Комментарии</span>
    </div >

    <x-comments.card-comment post="$post" dropdownDotsNumber="1" />
    <x-comments.card-comment orientation="right" post="$post" dropdownDotsNumber="2"/>


</div>
