<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

    <a href="#" class="text-2xl max-mob-l:text-md  flex items-center mb-6 font-semibold text-gray-900 dark:text-white">
        <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
        Flowbite
    </a>

    <div class="w-full max-mob-s-not-equally:overflow-auto bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <fieldset class="w-full p-3 max-mob-l:p-1 space-y-4 md:space-y-6 ">

            <h1 class="text-center text-md mob-l:text-lg sm:text-2xl font-bold text-gray-900 leading-tight tracking-tight dark:text-white">
                Войти в Аккаунт
            </h1>
                <x-errors />
                {{-- <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                </div> --}}
                <x-union.form.union-label-input placeholder="Почта или логин" type="text" label="Почта" name="email_login"/>

                <x-union.form.union-label-input placeholder="••••••••" name="password" type="password" label="Пароль"/>

                <div class="max-sm:flex-col flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                        </div>
                        <div class="ml-3 text-sm max-mob-m:text-xs">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Запомнить меня</label>
                        </div>
                    </div>
                    <a href="#" class="max-sm:w-full text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Забыли Пароль?</a>
                </div>
                <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                <p class="text-sm max-mob-m:text-center font-light text-gray-500 dark:text-gray-400">
                    У Вас нету аккаунта? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Создать аккаунт</a>
                </p>

        </fieldset>
    </div>
</div>

