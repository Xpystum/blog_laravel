<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title.page', config('app.name'))</title>

    @vite(['resources/css/app.sass', 'resources/js/app.js', 'resources/css/app.scss'])

    {{-- подключение js по необходимости --}}
    @stack('header')

    {{-- подключение livewire при необходимости --}}
    @stack('livewire-css')

</head>
<body class="dark flex flex-col h-screen">

    <div class="flex flex-col min-h-screen m-0 p-0 bg-gray-800">

        @include('includes.header')

        @include('includes.alert')

        <main class="mt-custom-top-header flex-1 py-8 pb-2 flex items-center justify-center bg-gray-700 w-full">

            @yield('content')

        </main>

        @include('includes.footer')

    </div>

    @stack('livewire-js')

    {{-- кнопка back_to_top/back_to_down --}}
    <x-buttons.back-to-button />

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    @stack('scripts')

    @vite('resources/js/alerts/alert.js')
    @vite('resources/js/Tiptap/codeBlockCopy.js')

</body>
</html>
