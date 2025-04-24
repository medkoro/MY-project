<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KidsLearn - Fun Learning Platform</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/child-friendly.css') }}" rel="stylesheet">
    <link href="{{ asset('css/games.css') }}" rel="stylesheet">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Sans+MS&family=Bubblegum+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="nav">
        <div class="nav-brand">
            <img src="{{ asset('images/kidslearn.jpg') }}" alt="KidsLearn Logo" width="50">
            <span>KidsLearn</span>
        </div>
        <div class="nav-links">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
            <a href="{{ route('games') }}" class="nav-link">Games</a>
            <a href="{{ route('learn') }}" class="nav-link">Learn</a>
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Admin</a>
                @endif
                <a href="{{ route('profile') }}" class="nav-link">Profile</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} KidsLearn. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/animations.js') }}"></script>
    <script src="{{ asset('js/games.js') }}"></script>
    @if(auth()->check() && auth()->user()->is_admin)
        <script src="{{ asset('js/admin-dashboard.js') }}"></script>
    @endif
</body>
</html>