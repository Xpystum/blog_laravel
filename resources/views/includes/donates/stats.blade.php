

    @foreach ($stats as $stat)

        <h6 class="mt-2">
            {{ __('Статистика для :currency', ['currency' => $stat->currency_id]) }}
        </h6>

        <div class="row border-bottom mt-3">
            <div class="col-12 col-md-4">
                <x-card>
                    <x-card-body>
                        <div class="mb-1 text-muted small">
                            {{ __('Количество донатов') }}
                        </div>
                
                        <h4 class="m-0">{{  money($stat?->total_count, $stat->currency_id)  }}</h4>
                    </x-card-body>
                </x-card>
            </div>

            <div class="col-12 col-md-4">
                <x-card>
                    <x-card-body>
                        <div class="mb-1 text-muted small">
                            {{ __('Общая сумма') }}
                        </div>
                
                        <h4 class="m-0">
                            {{ money($stat?->total_amount, $stat->currency_id) }}
                      
                        </h4>
                    </x-card-body>
                </x-card>
            </div>

            <div class="col-12 col-md-4">
                <x-card>
                    <x-card-body>
                        <div class="mb-1 text-muted small">
                            {{ __('Средняя сумма') }}
                        </div>
                
                        <h4 class="m-0">
                            {{ money($stat?->avg_amount, $stat->currency_id) }}
                        </h4>
                    </x-card-body>
                </x-card>
            </div>

            <div class="col-12 col-md-4">
                <x-card>
                    <x-card-body>
                        <div class="mb-1 text-muted small">
                            {{ __('Максимальная сумма продажи') }}
                        </div>
                
                        <h4 class="m-0">
                            {{ money($stat?->max_amount, $stat->currency_id) }}
                        </h4>
                    </x-card-body>
                </x-card>
            </div>

            <div class="col-12 col-md-4">
                <x-card>
                    <x-card-body>
                        <div class="mb-1 text-muted small">
                            {{ __('Минимальная сумма продажи') }}
                        </div>
                
                        <h4 class="m-0">
                            {{ money($stat?->min_amount, $stat->currency_id) }}
                        </h4>
                    </x-card-body>
                </x-card>
            </div>
        </div>


    @endforeach



