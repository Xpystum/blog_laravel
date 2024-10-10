<header class="min-h-16 max-h-16 border-bottom ">

    <nav class="min-h-15 max-h-16 bg-gray-600 py-3 flex w-full navbar navbar-expand-md navbar-light fixed top-0 z-100 text-white">

        <div class="container text-white">
          <a href="{{ route('home') }}" class="navbar-brand" >

            {{ config('app.name') }}

          </a>


          <button type="button" class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>

          <div class="navbar-collapse" id="navbar-collapse">

            <ul class="navbar-nav me-auto mb-2 mb-md-0">

                <li class="nav-item">

                    <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }}" aria-current="page" >

                        {{ __('Главная') }}

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('blog') }}" class="nav-link {{ active_link('blog*') }}" aria-current="page" >

                        {{ __('Блог') }}

                    </a>

                </li>

            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">

                <li class="nav-item">

                    <a href="{{ route('register') }}" class="nav-link {{ active_link('register') }}" aria-current="page" >

                        {{ __('Регистрация') }}


                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('login') }}" class="nav-link {{ active_link('login') }}" aria-current="page" >

                        {{ __('Вход') }}

                    </a>

                </li>

            </ul>

          </div>

        </div>

    </nav>

</header>
