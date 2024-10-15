<x-card class="card p-4">

    <x-card-header>

       <x-card-title>

        {{ __('Вход') }}

       </x-card-title>

       <x-slot name="right">

            <a href=" {{route('register')}} " >

                {{ __('Регистрация') }}

            </a>

       </x-slot>



    </x-card-header>

    <x-card-body>

        <x-form action="{{ route('login.store') }}" method="POST">

           

        </x-form>

        @include('includes.social.social')

    </x-card-body>

</x-card>
