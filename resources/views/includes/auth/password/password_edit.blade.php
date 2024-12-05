<x-auth.password.password_wrapp action="{{ route('password.update', $passwordReset->uuid) }}">
    <div class="flex flex-col justify-center">

        <div class="flex justify-center mb-5">
            <i class="fa-solid fa-key fa-fade fa-2x" style="color: #057a55;"></i>
        </div>

        <h1 class="mb-5 text-xl text-center font-bold leading-[1.5] tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Изменения пароля
        </h1>

        <div class=" md:w-[500px] max:md:w-fuul mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2  text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Придумайте новый пароль :</h5>
            <span class="block my-1 mb-3 w-full h-[0.5px] bg-gray-500 opacity-40"></span>

            <div>
                <x-union.form.union-label-input class="mt-3" placeholder="Пароль" name="password" type="password" label="false" autofocus='autofocus' />
            </div>

            <div class="mt-3">
                <x-union.form.union-label-input class="mt-3" placeholder="Повторите пароль" name="password_confirmation " type="password" label="false"/>
            </div>

            <div class="mt-2 flex flex-row justify-between items-center">
                <x-button class="mt-3" type="submit" >Изменить пароль</x-button>
                <x-link class="max-mob-m:text-center" href="{{ route('login') }}">Войти в аккаунт</x-link>
            </div>

        </div>

    </div>

</x-auth.password.password_wrapp>


