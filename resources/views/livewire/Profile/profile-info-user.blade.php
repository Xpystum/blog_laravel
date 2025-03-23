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
                <p class="text-gray-400 max-h-[170px] overflow-hidden">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta nam nesciunt mollitia accusamus
                    quibusdam accusantium?
                    Repellat, laboriosam vitae adipisci eos consequuntur repudiandae ut obcaecati impedit eligendi,
                    animi illo nesciunt vero sunt aliquid
                    quaerat accusamus ea fuga quas voluptatem? Unde voluptas tenetur facilis ut similique, enim
                    reiciendis fugiat nihil quae perspiciatis!    quaerat accusamus ea fuga quas voluptatem? Unde voluptas tenetur facilis ut similique, enim
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
                    <h3 class="text-white font-bold">Мои навыки</h3>
                </header>
                <div class="flex flex-row">
                    <x-svg.laravel />
                    <x-svg.figma />
                    <x-svg.html />
                    <x-svg.css />
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

                <div class="flex flex-row mt-2 items-center">
                    <x-union.union-skill-progress-svg-flowbite value_skill="100" >
                        <x-svg.adobeillustrator :width='56' :height='56' />
                    </x-union.union-skill-progress-svg-flowbite>
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
