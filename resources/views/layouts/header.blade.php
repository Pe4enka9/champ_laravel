<header class="mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}"
                           href="{{ route('products.index') }}">Товары</a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                               href="{{ route('categories.index') }}">Категории</a>
                        </li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Выйти</button>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register.form') ? 'active' : '' }}"
                               href="{{ route('register.form') }}">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login.form') ? 'active' : '' }}"
                               href="{{ route('login.form') }}">Авторизация</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
