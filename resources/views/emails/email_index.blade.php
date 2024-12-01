@extends('templates.main')

@section('title.page', 'Страница отправки подтверждения почты')

@section('main.content')

    <div>

        <div class="flex justify-center mb-5">
            <i class="fa-solid fa-envelope-circle-check fa-fade fa-2xl" style="color: #057a55;"></i>
        </div>
        <h1 class="mb-5 text-xl text-center font-bold leading-[1.5] tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Подтвреждения почты
        </h1>


        <div class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2  text-xl font-bold tracking-tight text-gray-900 dark:text-white"> Перейдите по ссылке из письма, отправленного на Ваш email для подтверждения.</h5>
            <span class="block my-1 w-full h-[0.5px] bg-gray-500 opacity-40"></span>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Нажмите кнопку снизу что бы отправить уведомление на почту:</p>

            <div class="w-full flex justify-center">
                <x-button>Отправить еще раз</x-button>
            </div>
        </div>
    </div>


@endsection
