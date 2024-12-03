<div class="flex flex-grow flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">

    <a href="{{ route('home') }}" class="text-2xl max-mob-l:text-md  flex items-center mb-6 font-semibold text-gray-900 dark:text-white">
        <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
        Flowbite
    </a>

    <div class="w-full max-mob-s-not-equally:overflow-auto bg-white rounded-lg shadow dark:border  md:mt-1 md:max-w-xl xl:p-1 dark:bg-gray-800 dark:border-gray-700">
        <fieldset class="w-full p-3 max-mob-l:p-1 space-y-4 md:space-y-6 ">

            <h1 class="text-center xl:text-xl max-lg:text-xl max-md:text-md max-sm:text-md font-bold text-gray-900 leading-tight tracking-tight dark:text-white">
                Вход в Аккаунт
            </h1>
                <x-errors.alert-errors />

                <x-union.form.union-label-input placeholder="Почта или логин" type="text" label="Почта" name="email_login"/>
                <x-errors.error name="email_login" />

                <x-union.form.union-label-input placeholder="••••••••" name="password" type="password" label="Пароль"/>
                <x-errors.error name="password"/>

                {{-- max-sm:flex-col flex items-center justify-between --}}
                <div class="flex items-center justify-between">
                    <div class="flex justify-start items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" name="remember" aria-describedby="remember" value="1" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                        </div>
                        <div class="ml-3 text-sm max-mob-m:text-xs">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Запомнить меня</label>
                        </div>
                    </div>
                    <a href="#" class="max-sm:w-full text-sm max-sm:text-right font-medium text-primary-600 hover:underline dark:text-primary-500">Забыли Пароль?</a>
                </div>
                <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Войти</button>
                <p class="text-sm max-mob-m:text-center font-light text-gray-500 dark:text-gray-400">
                    У Вас нету аккаунта? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Создать аккаунт</a>
                </p>

        </fieldset>
    </div>
</div>

