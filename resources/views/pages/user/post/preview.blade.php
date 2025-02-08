@extends('templates.main')

@section('title.page', 'Страница отправки подтверждения почты')

@section('main.content')

    @include('includes.user.post.card-preview')
    @include('includes.user.comments.chat-comments-includes')
    
    @pushIf(session()->has('alert_success') ? session()->get('alert_success') : null, 'scripts')
        <script>

            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: "smooth"
            });

        </script>
    @endPushIf

@endsection
