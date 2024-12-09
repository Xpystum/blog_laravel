<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title.page', config('app.name'))</title>

    @vite(['resources/css/app.sass', 'resources/js/app.js'])

    @stack('header')


</head>
<body class="dark flex flex-col h-screen">

    <div class="flex flex-col min-h-screen m-0 p-0 bg-gray-800">

        @include('includes.header')

        @include('includes.alert')

        <main class="flex-1 py-5 pb-2 flex items-center justify-center bg-gray-700 w-full">

            @yield('content')

        </main>

        @include('includes.footer')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @vite('resources/js/alerts/alert.js')


</body>
</html>
