<header class="py-3 border-bottom">
    <div class="d-flex justify-content-around">

        <div>

            

            <ul class="list-unstyled d-flex">

                <li class="me-3">

                    <a href="{{ route('home') }}">
                        {{ config('app.name') }}
                    </a>

                </li>

                <li  class="me-3">

                    <a href="{{ route('blog') }}"> 
                        <span>
                            Блог 
                        </span>
                    </a>

                </li>

            </ul>

        </div>

        <div>
            <ul class="list-unstyled d-flex">

                <li  class="ms-3">

                    <a href="{{ route('register') }}""> 
                        <span>
                            Регистрация 
                        </span>
                    </a>

                </li>


                <li class="ms-3">

                    <a href="{{ route('login') }}"> 

                        <span>
                            Вход 
                        </span>

                    </a>

                </li>


            </ul>
        </div>

    </div>
</header>
