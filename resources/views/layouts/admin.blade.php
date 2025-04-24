@extends('layouts.app')

@section('content')
<div class="admin-container">
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
            <li><a href="{{ route('admin.contents.index') }}">Contents</a></li>
        </ul>
    </div>
    <div class="admin-main">
        @yield('admin-content')
    </div>
</div>
@endsection