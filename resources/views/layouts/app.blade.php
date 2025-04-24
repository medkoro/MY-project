<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Kids Learning App') }}</title>
    <!-- Include Vite assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f0f8ff; }
        .container { max-width: 960px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1, h2 { color: #333; }
        nav ul { list-style: none; padding: 0; }
        nav ul li { display: inline; margin-right: 10px; }
        nav a { text-decoration: none; color: #007bff; }
        nav a:hover { text-decoration: underline; }
        .categories-list li { margin-bottom: 10px; }
        .content-item { border: 1px solid #eee; padding: 15px; margin-bottom: 15px; border-radius: 5px; background-color: #fff; }
        .content-item img, .content-item video { max-width: 100%; height: auto; display: block; margin-top: 10px; }
        .content-item audio { width: 100%; margin-top: 10px; }
        .admin-link { display: block; margin-top: 20px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><a href="{{ route('home') }}">{{ config('app.name', 'Kids Learning App') }}</a></h1>
            <hr>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <hr>
            <p>&copy; {{ date('Y') }} Kids Learning App</p>
            <div class="admin-link">
                <a href="{{ route('admin.content.index') }}">Admin Panel</a>
            </div>
        </footer>
    </div>
</body>
</html>
