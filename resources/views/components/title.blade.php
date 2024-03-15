

<div class="border-bottom mb-3">

    @isset($link)

        <div class="mb-2">
            {{ $link }}
        </div>

    @endisset

    <div class="d-flex justify-content-between align-items-center">

        {{ $slot }}

        @isset($right)

            <div>

                {{ $right }}

            </div>

        @endisset
    </div>

</div>
