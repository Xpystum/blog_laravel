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

            <x-form-item>
                
                <x-label required>
                    {{__('Email')}}
                </x-label>

                <x-input type="email" name="email" autofocus />

            </x-form-item>

            <x-form-item>

                <x-label required>
                    {{__('Password')}}
                </x-label>

                <x-input type="password" name="password" />
        
            </x-form-item>

            <x-form-item>

                <x-chexbox name="remember" value="1">
                    
                    {{ __('Запомнить меня') }}

                </x-chexbox>

            </x-form-item>

            <x-button type="submit">
                {{ __('Войти') }}
            </x-button>

        </x-form>

    </x-card-body>

</x-card>