<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title.page', config('app.name'))</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    
    @stack('trix') 
    {{-- wsefwe --}}

    <style>

        .required::after {
            content: '*';
            color : red;
            margin-left: 4px;

        }

        .container {
            max-width: 1024px;
        }
        
        .trix-editor{
            height: 350px ;
        }

        @media (max-width: 768px) {

            .container {
                max-width: 720px;
            }

        }


    </style>
</head>
<body>

    <div class="d-flex flex-column justify-content-between min vh-100">

        @include('includes.header')

        @include('includes.alert')

    
        
        <main class="flex-grow-1 py-3">
           
            @yield('content')

        </main>
        
        @include('includes.footer')
       
        
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.min.js" ></script>
    
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
    @stack('Quill') 
</body>
</html>