<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KidsLearn Admin Panel</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Sans+MS&family=Bubblegum+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="admin-sidebar">
            <div class="admin-brand">
                <img src="{{ asset('images/kidslearn.jpg') }}" alt="KidsLearn Logo" width="50">
                <span>Admin Panel</span>
            </div>
            <nav class="admin-nav">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('admin.contents.index') }}">Contents</a></li>
                    <li><a href="{{ route('admin.games.index') }}">Games</a></li>
                    <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="admin-main">
            <header class="admin-header">
                <h1>@yield('title', 'Admin Dashboard')</h1>
                <div class="admin-user">
                    Welcome, {{ auth()->user()->name }}
                </div>
            </header>

            <main class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>