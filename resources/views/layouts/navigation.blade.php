<nav>
    <!-- Navigation simple -->
    <ul>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        @auth
            <li><a href="{{ url('/admin') }}">Admin</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Déconnexion
                    </a>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Connexion</a></li>
            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Inscription</a></li>
            @endif
        @endauth
    </ul>
</nav>