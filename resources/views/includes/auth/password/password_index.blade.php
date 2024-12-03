<div class="flex flex-col justify-center">

    <div class="flex justify-center mb-5">
        <i class="fa-solid fa-share-from-square fa-fade fa-2x" style="color: #057a55;"></i>
    </div>

    <h1 class="mb-5 text-xl text-center font-bold leading-[1.5] tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Восстановление пароля
    </h1>

    <div class="w-3/4 mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2  text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Для восстановление пароля введите ваш email от аккаунта:</h5>
        <span class="block my-1 mb-3 w-full h-[0.5px] bg-gray-500 opacity-40"></span>

        <x-union.form.union-label-input placeholder="Email" name="email" type="email" label="false"/>

        <div class="mt-2 flex flex-row justify-between items-center">
            <x-button class="mt-3" type="submit" >Продолжить</x-button>
            <x-link href="{{ route('login') }}">Войти в аккаунт</x-link>
        </div>


        </div>
    </div>
</div>

<script>


</script>
