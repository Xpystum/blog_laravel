@php

    $projectArray = json_decode($projectArray);

    $countSkills = count($skills);

    $half = ceil($countSkills / 2);

@endphp

<section class="flex flex-col">
    <div class="full-w flex flex-row">

        <!-- Основная информация о пользователе -->
        <article class="flex w-1/2 flex-col">
            <header>
                <h3 class="text-white font-bold h3">Полное Имя</h3>
            </header>
            <p class="text-gray-400">{{ $profile->full_name }}</p>

            <section class="about mt-2">
                <header>
                    <h3 class="text-white font-bold">Обо мне</h3>
                </header>
                <p class="text-gray-400 max-h-[170px] overflow-hidden whitespace-normal break-words">
                    {{ $about }}
                </p>
            </section>
        </article>

        <!-- Контактная информация и проекты -->
        <article class="ml-4 flex w-1/2 flex-col ml-2">
            <div class="flex flex-col">
                <header>
                    <h3 class="text-white font-bold">Email Address</h3>
                </header>
                <p class="text-gray-400">{{ $user->email }}</p>
            </div>

            <div class="flex flex-col mt-2">
                <header>
                    <h3 class="text-white font-bold">Мои проекты</h3>
                </header>
                <div class="text-gray-400 text-wrap overflow-hidden max-h-[100px]">

                    @if ($projectArray)
                        @foreach ($projectArray as $value)
                            <div class="inline-flex flex-row items-center">
                                <a href="{{ $value->value }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Проект-{{ $loop->index+1 }}</a>
                                @if (!$loop->last)

                                @endif
                                <div class="mx-2 h-5 border-l border-gray-500 opacity-50"></div>
                            </div>
                        @endforeach
                    @else
                        Проекты не указаны.
                    @endif

                </div>
            </div>



            <div class="flex flex-col mt-2">
                <header>
                    <h3 class="text-white font-bold">Мои навыки</h3>
                </header>
                <div class="flex flex-row flex-wrap">

                    @if($selectedItems)

                        @foreach ($selectedItems as $key => $item)

                            @if($item)
                                <x-dynamic-component :component="'svg.' . $key" />
                            @endif

                        @endforeach

                    @endif

                </div>
            </div>
        </article>

    </div>


    <article class="mt-4">

        <header>
            <h3 class="text-white font-bold h3">Профессиональных навыки</h3>
        </header>
        <div class="flex flex-row">

            @if ($skills)

                <div class="flex flex-col w-1/2 mt-6">
                    @foreach (array_slice($skills, 0, $half) as $item)
                        <div class="flex flex-row mt-2 items-center mb-4">
                            <x-union.union-skill-progress-svg-flowbite :value_skill="$item['percent']" >
                                <x-dynamic-component :component="'svg.' . $item['name']" :width='56' :height='56'/>
                            </x-union.union-skill-progress-svg-flowbite>
                        </div>
                    @endforeach
                </div>


                <div class="flex flex-col w-1/2 mt-6">
                    @foreach (array_slice($skills, $half) as $item)
                        <div class="flex flex-row mt-2 items-center mb-4">
                            <x-union.union-skill-progress-svg-flowbite :value_skill="$item['percent']" >
                                <x-dynamic-component :component="'svg.' . $item['name']" :width='56' :height='56'/>
                            </x-union.union-skill-progress-svg-flowbite>
                        </div>
                    @endforeach
                </div>

            @else
                <p class="text-gray-400 max-h-[170px] overflow-hidden whitespace-normal break-words">
                    Профессиональных навыки не указаны.
                </p>
            @endif
        </div>

    </article>
</section>
