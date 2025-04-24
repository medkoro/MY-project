@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="admin-dashboard">
    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="admin-card">
            <h3>Total Users</h3>
            <p class="stat-number">{{ $stats['users']['total'] }}</p>
            <p class="stat-label">Active: {{ $stats['users']['active'] }}</p>
        </div>

        <div class="admin-card">
            <h3>Total Games</h3>
            <p class="stat-number">{{ $stats['games']['total'] }}</p>
            <p class="stat-label">Active: {{ $stats['games']['active'] }}</p>
        </div>

        <div class="admin-card">
            <h3>Total Content</h3>
            <p class="stat-number">{{ $stats['content']['total'] }}</p>
            <p class="stat-label">Published: {{ $stats['content']['published'] }}</p>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h2>Recent Activity</h2>
        </div>
        <div class="activity-list">
            <!-- Activity items will be added dynamically -->
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h2>Quick Actions</h2>
        </div>
        <div class="quick-actions">
            <a href="{{ route('admin.contents.create') }}" class="admin-btn admin-btn-primary">Add New Content</a>
            <a href="{{ route('admin.games.create') }}" class="admin-btn admin-btn-primary">Add New Game</a>
            <a href="{{ route('admin.categories.create') }}" class="admin-btn admin-btn-primary">Add New Category</a>
        </div>
    </div>
</div>
@endsection 