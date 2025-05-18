@php
    $projectArray = json_decode(Auth::user()->profile?->project?->project_json);
@endphp

<section class="flex flex-col">
    <div class="full-w flex flex-row">

        <!-- Основная информация о пользователе -->
        <article class="flex w-1/2 flex-col">
            <header>
                <h3 class="text-white font-bold h3">Полное Имя</h3>
            </header>
            <p class="text-gray-400">{{ Auth::user()->profile->full_name }}</p>

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
                <p class="text-gray-400">{{ Auth::user()->email }}</p>
            </div>

            <div class="flex flex-col mt-2">
                <header>
                    <h3 class="text-white font-bold">Мои проекты</h3>
                </header>
                <div class="text-gray-400 text-wrap overflow-hidden max-h-[100px]">
                    @foreach ($projectArray as $value)
                        <div class="inline-flex flex-row items-center">
                            <a href="{{ $value->value }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Проект-{{ $loop->index+1 }}</a>
                            @if (!$loop->last)

                            @endif
                            <div class="mx-2 h-5 border-l border-gray-500 opacity-50"></div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col mt-2">
                <header>
                    <h3 class="text-white font-bold">Мои навыки</h3>
                </header>
                <div class="flex flex-row">
                    <x-svg.laravel />
                    <x-svg.figma />
                    <x-svg.html />
                    <x-svg.css/>
                </div>
            </div>
        </article>

    </div>


    <article class="mt-4">

        <header>
            <h3 class="text-white font-bold h3">Профессиональных навыки</h3>
        </header>
        <div class="flex flex-row">

            <div class="flex flex-col w-1/2">

                <div class="flex flex-row mt-2 items-center">
                    <x-union.union-skill-progress-svg-flowbite value_skill="75" >
                        <x-svg.adobeillustrator :width='56' :height='56' />
                    </x-union.union-skill-progress-svg-flowbite>
                </div>


            </div>

            <div class="flex flex-col w-1/2">

                <div class="flex flex-row mt-2 items-center mb-4">
                    <x-union.union-skill-progress-svg-flowbite value_skill="100" >
                        <x-svg.adobeillustrator :width='56' :height='56' />
                    </x-union.union-skill-progress-svg-flowbite>
                </div>


            </div>
        </div>


    </article>
</section>
