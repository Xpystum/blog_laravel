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

            @if( session('email-confirmation-sent') )

                <x-button x-data="{ isButtonDisabled: true }" x-bind:disabled="isButtonDisabled" type="button" x-on:click="$refs.form_email_send.submit()" x-bind:class="isButtonDisabled ? 'disabled cursor-not-allowed' : ''" >
                    Отправить еще раз
                    <div x-data="timerComponent()" x-show="showTimer">
                        <!-- Отображение оставшегося времени -->
                        <span x-text="timeLeft"></span> секунд(ы)
                    </div>

                    <x-form class="d-none" x-ref="form_email_send" action="{{ route('email.send') }}" method="post" />
                </x-button>

            </div>


            @else

                <x-button type="button" x-data x-on:click="$refs.form_email_send.submit()">
                    Отправить еще раз
                    <x-form class="d-none" x-ref="form_email_send" action="{{ route('email.send') }}" method="post" />
                </x-button>

            @endunless

        </div>
    </div>
</div>

<script>


    function timerComponent() {

        return {

            timer: null,
            timeLeft: parseInt(@json( session()->get('email-confirmation-sent', 10)['disabled'] ?? 0 )), // Время в секундах
            showTimer: true, // Свойство для управления показом таймера

            // Монтируем таймер при загрузке
            init() {
                this.startTimer();
            },



            // Функция запуска таймера
            startTimer() {

                if(this.timeLeft !== null) {

                    this.timer = setInterval(() => {

                        if (this.timeLeft > 0) {
                            this.timeLeft -= 1; // Уменьшаем время
                        } else {
                            this.isButtonDisabled = false; // Разблокируем кнопку
                            this.showTimer = false;
                            clearInterval(this.timer); // Останавливаем таймер
                        }

                    }, 1000); // Интервал: 1 секунда

                }
            }


        };
    }




</script>
