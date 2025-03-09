<section class="flex flex-col">
    <div class="flex flex-row">

        <!-- Основная информация о пользователе -->
        <article class="flex w-1/2 flex-col">
            <header>
                <h3 class="text-white font-bold h3">Полное Имя</h3>
            </header>
            <p class="text-gray-400">Женя Кузьмина</p>

            <section class="about mt-2">
                <header>
                    <h3 class="text-white font-bold">Обо мне</h3>
                </header>
                <p class="text-gray-400">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta nam nesciunt mollitia accusamus
                    quibusdam accusantium?
                    Repellat, laboriosam vitae adipisci eos consequuntur repudiandae ut obcaecati impedit eligendi,
                    animi illo nesciunt vero sunt aliquid
                    quaerat accusamus ea fuga quas voluptatem? Unde voluptas tenetur facilis ut similique, enim
                    reiciendis fugiat nihil quae perspiciatis!
                </p>
            </section>
        </article>

        <!-- Контактная информация и проекты -->
        <article class="flex w-1/2 flex-col ml-2">
            <div class="flex flex-col">
                <header>
                    <h3 class="text-white font-bold">Email Address</h3>
                </header>
                <p class="text-gray-400">test@mail.ru</p>
            </div>

            <div class="flex flex-col mt-2">
                <header>
                    <h3 class="text-white font-bold">Мои проекты</h3>
                </header>
                <p class="text-gray-400">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ссылка 1</a>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ссылка 2</a>
                </p>
            </div>

            <div class="flex flex-col mt-2">
                <header>
                    <h3 class="text-white font-bold">Социальные сети</h3>
                </header>
                <div class="flex flex-row">
                    <x-svg.telegram />
                    <x-svg.behance />
                    <x-svg.github />
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
                    <x-svg.adobeillustrator :width='56' :height='56'/>
                    <div class="ml-2 w-2/3">
                        {{-- TODO Для spana сделать описание базовости и т.д --}}
                        <span class="mb-1 text-[#A8C8EE] text-lg">Базовый</span>
                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="flex flex-col w-1/2">
                <div class="flex flex-row mt-2">
                    <x-svg.adobeafteraffects :width='56' :height='56'/>

                    <div class="w-1/2 bg-gray-200 rounded-full dark:bg-gray-700">
                        <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
                    </div>
                </div>
                <div>

                </div>
                <div>

                </div>
                <div>

                </div>
            </div>
        </div>

    </article>
</section>
