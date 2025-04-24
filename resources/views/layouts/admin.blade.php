<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KidsLearn Admin Panel</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Sans+MS&family=Bubblegum+Sans&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-xl">
            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <span class="text-2xl font-bold text-blue-600">KidsLearn</span>
                    <span class="px-3 py-1 text-sm bg-purple-100 text-purple-600 rounded-full">Admin</span>
                </div>
            </div>
            <nav class="mt-6">
                <div class="px-6 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link block">Dashboard</a>
                    <a href="{{ route('admin.categories.index') }}" class="nav-link block">Categories</a>
                    <a href="{{ route('admin.contents.index') }}" class="nav-link block">Contents</a>
                    <a href="{{ route('admin.games.index') }}" class="nav-link block">Games</a>
                    <a href="{{ route('admin.users.index') }}" class="nav-link block">Users</a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <button type="submit" class="btn btn-secondary w-full">Logout</button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <header class="bg-white shadow-md">
                <div class="px-6 py-4">
                    <h1 class="text-2xl font-bold text-gray-800">@yield('title', 'Dashboard')</h1>
                </div>
            </header>

            <main class="p-6">
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
</body>
</html>