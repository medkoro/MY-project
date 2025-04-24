<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - {{ config('app.name', 'Kids Learning App') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f8f9fa; }
        .container { max-width: 1140px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1, h2, h3 { color: #343a40; }
        nav ul { list-style: none; padding: 0; margin-bottom: 20px; border-bottom: 1px solid #dee2e6; padding-bottom: 10px; }
        nav ul li { display: inline; margin-right: 15px; }
        nav a { text-decoration: none; color: #007bff; font-weight: 500; }
        nav a:hover { text-decoration: underline; }
        .btn { display: inline-block; font-weight: 400; color: #212529; text-align: center; vertical-align: middle; user-select: none; background-color: transparent; border: 1px solid transparent; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .25rem; transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out; }
        .btn-primary { color: #fff; background-color: #007bff; border-color: #007bff; }
        .btn-primary:hover { color: #fff; background-color: #0056b3; border-color: #0056b3; }
        .btn-secondary { color: #fff; background-color: #6c757d; border-color: #6c757d; }
        .btn-warning { color: #212529; background-color: #ffc107; border-color: #ffc107; }
        .btn-danger { color: #fff; background-color: #dc3545; border-color: #dc3545; }
        .btn-sm { padding: .25rem .5rem; font-size: .875rem; line-height: 1.5; border-radius: .2rem; }
        .table { width: 100%; margin-bottom: 1rem; color: #212529; border-collapse: collapse; }
        .table th, .table td { padding: .75rem; vertical-align: top; border-top: 1px solid #dee2e6; }
        .table thead th { vertical-align: bottom; border-bottom: 2px solid #dee2e6; }
        .alert { position: relative; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem; }
        .alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; }
        .alert-danger { color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; }
        .form-group { margin-bottom: 1rem; }
        .form-control { display: block; width: 100%; padding: .375rem .75rem; font-size: 1rem; font-weight: 400; line-height: 1.5; color: #495057; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; }
        label { display: inline-block; margin-bottom: .5rem; }
        .text-right { text-align: right; }
        .mb-3 { margin-bottom: 1rem !important; }
        .mt-3 { margin-top: 1rem !important; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Panel</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.content.index') }}">Manage Content</a></li>
                    <li><a href="{{ route('admin.content.create') }}">Add New Content</a></li>
                    <li><a href="{{ route('admin.categories.create') }}">Add New Category</a></li>
                    <li><a href="{{ route('home') }}" target="_blank">View Site</a></li>
                </ul>
            </nav>
        </header>

        <main>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

        <footer>
            <hr class="mt-3">
            <p>&copy; {{ date('Y') }} Admin Panel</p>
        </footer>
    </div>
</body>
</html>
