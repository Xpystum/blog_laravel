@php

    $user = $userAuth;
    $userOther = $userOther;
@endphp
<div class="border border-gray-600 border-opacity-50 flex flex-col max-w-2lg mx-auto">
    <div class="flex flex-row justify-between p-2.5 bg-[#19212c] items-center">

        <x-user.card.card-user :user="$user">

            <div>
                <a href="{{ route('users.profiles', $user->id) }}" class="text-sm font-semibold text-gray-900 dark:text-white">
                    {{ $user->login }}
                </a>
                <div class="flex items-center">
                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> <span class="text-green-500">Online</span>
                </div>
            </div>

        </x-user.card.card-user>

        <div class="h-px w-3/4 my-4 bg-gray-600"></div>

        <x-user.card.card-user :orientation="'right'" :user="$userOther">

            <div class="flex flex-col mr-2">
                <a href="{{ route('users.profiles', $userOther->id) }}" class="ml-auto text-sm font-semibold text-gray-900 dark:text-white">{{ $userOther->login }}</a>
                <div class="flex flex-row items-center">
                    <div class="h-2.5 w-2.5 rounded-full bg-green-500  me-2"></div>
                    <span class="text-green-500">Online</span>
                </div>
            </div>

        </x-user.card.card-user>

    </div>

    @livewire('message-personal', [
        'messages' => $messages,
        'userAuth' => $userAuth,
        'userOther' => $userOther,
        'chatPersonalId' => $chatPersonalId
    ]);
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', ()=>{
        var channel = window.Echo.channel('message');
        channel.listen('.my-event', function(data) {
        alert(JSON.stringify(data));
        });
    });
</script> --}}


