@extends('templates.auth')

@section('title.page', 'Страница Регистрации')


@section('auth.content')

<x-card class="card p-4">

    <x-card-header>

       <x-card-title>

        {{ __('Регистрация') }}

       </x-card-title>


       <x-slot name="right">

        <a href=" {{route('login')}} " >

            {{ __('Вход') }}
    
        </a>

   </x-slot>

    </x-card-header>

    <x-card-body>

        <x-form action="{{ route('register.store') }}" method="POST">
            
            <x-form-item>
                
                <x-label required>
                    {{__('Имя')}}
                </x-label>

                <x-input name="name" autofocus />

            </x-form-item>

            <x-form-item>
                
                <x-label required>
                    {{__('Email')}}
                </x-label>

                <x-input type="email" name="email" />

            </x-form-item>

            <x-form-item>

                <x-label required>
                    {{__('Пароль')}}
                </x-label>

                <x-input type="password" name="password" />
        
            </x-form-item>

            <x-form-item>

                <x-label required>
                    {{__('Введите пароль ещё раз')}}
                </x-label>

                <x-input type="password" name="password_confirmation" />
        
            </x-form-item>

            <x-form-item>

                <x-chexbox name="agreement" value="1">
                    
                    {{ __('Я согласен на обработку пользовательских данных') }}

                </x-chexbox>

            </x-form-item>

            <x-button type="submit">
                {{ __('Войти') }}
            </x-button>

        </x-form>

    </x-card-body>

</x-card>
    
@endsection
