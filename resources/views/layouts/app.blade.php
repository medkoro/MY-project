<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KidsLearn - Fun Learning Platform</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Sans+MS&family=Bubblegum+Sans&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-blue-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-blue-600">KidsLearn</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                        <a href="{{ url('/games') }}" class="nav-link">Games</a>
                        <a href="{{ url('/learn') }}" class="nav-link">Learn</a>
                        @auth
                            @if(auth()->user()->is_admin)
                                <a href="{{ url('/admin/dashboard') }}" class="nav-link">Admin</a>
                            @endif
                            <a href="{{ url('/profile') }}" class="nav-link">Profile</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="nav-link">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-md mt-auto">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-600">&copy; {{ date('Y') }} KidsLearn. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>