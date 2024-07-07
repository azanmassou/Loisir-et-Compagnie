<nav class="navbar navbar-expand-lg bg-light my-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="">Index</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Acceuil</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mesPosts') }}">Mes-posts</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">A-propos</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li> --}}
            </ul>
            @guest
                <a href="{{ route('auth.register') }}" class="btn btn-outline-primary mx-1">Inscription</a>
                <a href="{{ route('auth.login') }}" class="btn btn-outline-primary mx-1">Connexion</a>
            @endguest
            @auth
                <form action="{{ route('auth.logout') }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Deconnexion</button>
                    {{-- <a href="" type="submit" class="btn btn-outline-danger mx-1">Deconnexion</a> --}}
                </form>

            @endauth
        </div>
    </div>
</nav>
