

<div class="border-bottom mb-3">

    <div class="d-flex justify-content-between align-items-center mb-3">

        @isset($link)

        <div class="mb-2">
            {{ $link }}
        </div>

        @endisset

        {{ $slot }}

        @isset($right)
            {{ $right }}
        @endisset

    </div>

</div>
