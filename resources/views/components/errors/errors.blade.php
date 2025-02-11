
@if(isset($errors) && $errors?->any())



    <div class="alert alert-danger small p-2">
        <ul class="mb-0">

            @if ($errors?->has('error'))
                <div class="alert alert-danger">
                    {{ $errors?->first('error') }} <!-- Если есть ошибка, выводим её сообщение -->
                </div>
            @endif

            @foreach ($errors?->all() as $message)
                <li>
                    {{ $message }}
                </li>
            @endforeach

        </ul>
    </div>

  @endif
