<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-warning sticky-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{ url('/') }}">Biblioteka</a>
        <!-- Collapsible wrapper -->
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon navbar-dark "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link col align-self-centre" aria-current="page" href="{{ route('catalog') }}">Katalog</a>
                </li>
                <!-- Navbar dropdown -->
            </ul>
            <!-- Search form -->
            <form action="{{route('search')}}" method="GET" role="search" class="d-flex input-group w-auto col align-self-centre">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                           placeholder="Wyszukaj książkę"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-outline-primary ml-1 ">
                            <span class="glyphicon glyphicon-search">Szukaj</span>
                        </button>
                    </span>
                </div>
            </form>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown bg-warning">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-warning" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">{{ __('Konto') }} </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Wyloguj') }} </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
