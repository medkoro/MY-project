@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Total Users</h2>
            <p class="text-4xl font-bold text-blue-600">{{ $stats['users'] }}</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Total Games</h2>
            <p class="text-4xl font-bold text-green-600">{{ $stats['games'] }}</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Total Categories</h2>
            <p class="text-4xl font-bold text-purple-600">{{ $stats['categories'] }}</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Manage Content</h2>
    <div class="flex space-x-4">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Manage Categories</a>
        <a href="{{ route('admin.contents.index') }}" class="btn btn-secondary">Manage Contents</a>
        <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Manage Games</a>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Manage Users</a>
    </div>
</div>

<!-- Recent Activities -->
<div class="card">
    <h2 class="text-xl font-bold mb-4">Recent Activities</h2>
    <div class="table-container">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="table-header">
                <tr>
                    <th class="table-cell">User</th>
                    <th class="table-cell">Action</th>
                    <th class="table-cell">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($recentActivities ?? [] as $activity)
                <tr class="table-row">
                    <td class="table-cell">{{ $activity->user->name }}</td>
                    <td class="table-cell">{{ $activity->description }}</td>
                    <td class="table-cell">{{ $activity->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="table-cell text-center text-gray-500">No recent activities</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 