<x-auth.register.register_wrapp>
    <div class="flex flex-col items-center justify-center h-full">
        <a href="{{ route('home') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            Flowbite
        </a>

        <div class="w-full max-mob-s-not-equally:overflow-auto bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">

            <fieldset class="w-full  p-2 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Регистрация
                </h1>
                <x-errors.alert-errors />

                <div class="w-full box-border space-y-4 md:space-y-6">

                    <x-union.form.union-label-input placeholder="Ваш Логин" name="login" type="text" label="Логин"/>
                    <x-errors.error name="login" />

                    <x-union.form.union-label-input placeholder="Ваш Email" name="email" type="email" label="Email"/>
                    <x-errors.error name="email" />

                    <div>
                        <x-label for="typeSelectActivities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{__('Сфера деятельности:')}}
                        </x-label>

                        <x-select id="typeSelectActivities" placeholder="Кто вы?" name="type" :options="['Разработчик' => 'Разработчик', 'Дизайнер' => 'Дизайнер', 'Другое' => 'Другое']" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>
                        <x-errors.error name="type" />
                    </div>

                    <x-union.form.union-label-input placeholder="••••••••" name="password" type="password" label="Пароль"/>
                    <x-errors.error name="password" />

                    <x-union.form.union-label-input placeholder="••••••••" name="password_confirmation" type="password" label="Повторите пароль"/>

                    <div class="w-full flex items-start">
                        <div class="flex items-center h-5">
                            <input name="agreement" id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Я Принимаю
                                <a class="text-md max-mob-l:text-xs break-words font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Пользовательское соглашение</a>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">Создать Аккаунт</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        У вас уже есть аккаунт? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Войти</a>
                    </p>
                </div>

                @include('includes.social.social')
            </fieldset>
        </div>
    </div>
</x-auth.register.register_wrapp>
