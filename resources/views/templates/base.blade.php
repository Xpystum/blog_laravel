<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title.page', config('app.name'))</title>

    @vite(['resources/css/app.sass', 'resources/js/app.js'])

    @stack('header')

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="dark">

    <div class="d-flex flex-column justify-content-between min vh-100">

        @include('includes.header2')

        @include('includes.alert')



        <main class="bg-gray-700 flex-grow-1 py-3">

            @yield('content')

        </main>

        @include('includes.footer')


    </div>


    <script>

        document.addEventListener("DOMContentLoaded", function() {
          // Установить таймер для автоматического закрытия уведомления
          window.setTimeout(function() {
            const alert = document.querySelector('.custom-alert');
            if (alert) {
              // Закрыть уведомление
              new bootstrap.Alert(alert).close();
            }
          }, 3000); // Задержка в миллисекундах (3000 мс = 3 секунды)
        });


    </script>

    @stack('jsAfter')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
