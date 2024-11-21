@if($errors->any())

    <div class="alert alert-danger small">
        <ul class="mb-0">

            @foreach ($errors->all() as $message)

                <li>
                    <div class="p-1 mb-1 text-lg text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <span class="font-medium">Ошибка!</span> {{ $message }}
                    </div>
                </li>

            @endforeach

        </ul>
    </div>

  @endif
