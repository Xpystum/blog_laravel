<x-form action="{{ route('blog') }}" methopd="GET">

    <div class="row">

        <div class="col-12 col-md-4">

            <div class="mb-3">

                <x-input name="search" value="{{ request('search') }}" placeholder="{{ __('Поиск') }}" />

            </div>

        </div>


        <div class="col-12 col-md-4">

            <div class="mb-3">

                {{-- <x-select value="{{ request('category_id')}} " :options="['null' => __('Все категории'), 1 => 'Первая категория' ]" name="category_id" /> --}}
                    <x-input name="from_date" value="{{ request('from_date') }}" placeholder="{{ __('Дата начала') }}" />

            </div>

        </div>

        <div class="col-12 col-md-4">

            <div class="mb-3">

                {{-- <x-select value="{{ request('category_id')}} " :options="['null' => __('Все категории'), 1 => 'Первая категория' ]" name="category_id" /> --}}
                    <x-input name="to_date" value="{{ request('to_date') }}" placeholder="{{ __('Дата окончание') }}" />

            </div>

        </div>

        <div class="col-12 col-md-4">

            <div class="mb-3">

                <x-button type="submit" class="w-100">
                    {{ __("Применить") }}
                </x-button>

            </div>

        </div>
    
    </div>

</x-form>