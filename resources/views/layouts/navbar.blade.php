<nav style="height:100px" class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <div class="container">

        <!-- Navbar Brand -->
        <a style="font-family:'Yeon Sung';font-size:2.5rem;" class="navbar-brand" href="/">
            <img src="/images/outlet.svg" alt="" width="80" height="80" class="d-inline-block align-text-center">
            Outlet
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- -->

        <!-- Navbar -->
        <div class="d-flex justify-content-end">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <li><button class="dropdown-item" type="submit">Logout</button></li>
                                        </form>
                                        <li><a href="{{ route('register') }}" class="dropdown-item">Novo Usuário</a></li>
                                    </ul>
                                </li>
                        @else
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link text-white mr-2align-text-center">Admin Login</a>
                                </li>
                            </ul>
                            @endauth
                        @endif
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>