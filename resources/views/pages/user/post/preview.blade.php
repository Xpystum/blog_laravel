@extends('templates.main')

@section('title.page', 'Страница отправки подтверждения почты')

@section('main.content')

    @include('includes.user.post.card-preview')
    @include('includes.user.comments.chat-comments-includes')

    @php
        //получаем значение из сессии, и если ошибка или успешно добавлен комментарий, скроллим страницу вниз
        $alert_success = session()->has('alert_success') ? session()->get('alert_success') : null;
        $alert_error = session()->has('alert_error') ? session()->get('alert_error') : null;
    @endphp


    @pushOnce('scripts')
        <script>

            const button = document.querySelector('.button_card-preview-comment');

            if (button) {
                button.addEventListener('click', function(event) {

                    window.scrollTo({
                        top: document.body.scrollHeight,
                        behavior: "smooth"
                    });
                });
            }

        </script>
    @endPushOnce

    @pushIf( ($alert_success||$alert_error) , 'scripts')
        <script>

            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: "smooth"
            });

        </script>
    @endPushIf

@endsection
