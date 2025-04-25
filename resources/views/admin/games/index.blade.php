@extends('layouts.admin')

@section('title', 'Manage Games')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Manage Games</h1>
        <a href="{{ route('admin.games.create') }}" class="btn btn-primary">Create New Game</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="table-header">
                    <tr>
                        <th class="table-cell">Title</th>
                        <th class="table-cell">Description</th>
                        <th class="table-cell">URL</th>
                        <th class="table-cell">Image</th>
                        <th class="table-cell">Status</th>
                        <th class="table-cell">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($games as $game)
                        <tr class="table-row">
                            <td class="table-cell font-medium">{{ $game->title }}</td>
                            <td class="table-cell">{{ Str::limit($game->description, 100) }}</td>
                            <td class="table-cell"><a href="{{ $game->url }}" target="_blank" class="text-blue-600 hover:underline">View Game</a></td>
                            <td class="table-cell">
                                @if($game->image_path)
                                    <img src="{{ asset('storage/' . $game->image_path) }}" alt="{{ $game->title }}" class="h-12 w-auto object-cover rounded">
                                @else
                                    <span class="text-gray-400">No image</span>
                                @endif
                            </td>
                            <td class="table-cell">
                                <span class="badge {{ $game->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} rounded-full px-3 py-1">
                                    {{ $game->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="table-cell">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.games.edit', $game) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('admin.games.destroy', $game) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary btn-sm bg-red-500 hover:bg-red-600 text-white">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="table-cell text-center py-4 text-gray-500">No games found. Create a new one to get started!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
