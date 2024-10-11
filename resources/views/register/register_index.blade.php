@extends('templates.auth')

@section('title.page', 'Страница Регистрации')

@section('auth.content1')
    <x-card class="card bg-white shadow sm:rounded-lg">

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
                        {{__('Логин')}}
                    </x-label>

                    <x-input name="login" autofocus />

                </x-form-item>

                <x-form-item>

                    <x-label required>
                        {{__('Email')}}
                    </x-label>

                    <x-input type="email" name="email"/>

                </x-form-item>

                <x-form-item>

                    <x-label required>
                        {{__('Сфера деятельности:')}}
                    </x-label>

                    <x-select name="type" :options="['Разработчик' => 'Разработчик', 'Дизайнер' => 'Дизайнер']" />

                </x-form-item>

                <x-form-item>

                    <x-label required>
                        {{__('Пароль')}}
                    </x-label>

                    <x-input type="password" name="password" :value="null" />

                </x-form-item>

                <x-form-item>

                    <x-label required>
                        {{__('Введите пароль ещё раз')}}
                    </x-label>

                    <x-input type="password" name="password_confirmation" :value="null"/>

                </x-form-item>

                <x-form-item>

                    <x-chexbox type="checkbox" name="agreement">

                        {{ __('Я согласен на обработку пользовательских данных') }}

                    </x-chexbox>

                </x-form-item>

                <x-button type="submit">
                    {{ __('Войти') }}
                </x-button>

            </x-form>

            @include('includes.social.social')

        </x-card-body>

    </x-card>
@endsection
