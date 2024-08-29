

<div class="border-bottom mb-3">

    @isset($link)

        <div class="mb-2">
            {{ $link }}
        </div>

    @endisset

    <div class="d-flex justify-content-between align-items-center">
        <div>

            <h1 class="mb-3">

                {{ $slot }}
            
            </h1>

        </div>

        @isset($right)

            <div>

                {{ $right }}

            </div>

        @endisset
    </div>

</div>
