@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Users Card -->
    <div class="dashboard-card border-blue-500">
        <div class="dashboard-stat text-blue-600">{{ $usersCount ?? 0 }}</div>
        <div class="dashboard-label">Total Users</div>
    </div>

    <!-- Categories Card -->
    <div class="dashboard-card border-purple-500">
        <div class="dashboard-stat text-purple-600">{{ $categoriesCount ?? 0 }}</div>
        <div class="dashboard-label">Categories</div>
    </div>

    <!-- Contents Card -->
    <div class="dashboard-card border-green-500">
        <div class="dashboard-stat text-green-600">{{ $contentsCount ?? 0 }}</div>
        <div class="dashboard-label">Learning Contents</div>
    </div>

    <!-- Games Card -->
    <div class="dashboard-card border-pink-500">
        <div class="dashboard-stat text-pink-600">{{ $gamesCount ?? 0 }}</div>
        <div class="dashboard-label">Games</div>
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
                    <td class="table-cell">{{ $activity->user_name }}</td>
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