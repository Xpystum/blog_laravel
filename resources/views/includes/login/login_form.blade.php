<section class="h-85vh flex items-center justify-center">
    <div class="w-full flex flex-col items-center justify-center px-6 py-8 lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            Flowbite
        </a>
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Вход в аккаунт
                </h1>
                <div class="space-y-4 md:space-y-6" action="#">
                        <x-union.form.union-label-input placeholder="Ваш Email" type="email" label="Почта" name="email"/>
                    <div>
                        <x-union.form.union-label-input placeholder="••••••••" type="password" label="Пароль" name="password"/>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Запомнить меня</label>
                            </div>
                        </div>
                        <a href="#"
                            class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Забыли пароль?</a>
                    </div>
                    <button type="submit"
                    class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Войти
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        У вас нету аккаунта? <a href="#"
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">Зарегистрироваться</a>
                    </p>

                    @include('includes.social.social')

                </div>
            </div>
        </div>
    </div>
</section>
