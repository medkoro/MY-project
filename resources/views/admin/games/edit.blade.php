@extends('layouts.admin')

@section('title', 'Edit Game')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Edit Game: {{ $game->title }}</h1>
        <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Back to Games</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">
        <form action="{{ route('admin.games.update', $game) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="form-label">Game Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $game->title) }}" class="input-field" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="3" class="input-field" required>{{ old('description', $game->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="url" class="form-label">Game URL</label>
                <input type="url" name="url" id="url" value="{{ old('url', $game->url) }}" class="input-field" required>
                <p class="text-sm text-gray-500 mt-1">URL to the external game or interactive content</p>
                @error('url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="image" class="form-label">Game Image</label>
                
                @if($game->image_path)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $game->image_path) }}" alt="{{ $game->title }}" class="h-32 w-auto object-cover rounded">
                    </div>
                @endif
                
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-sm text-gray-500 mt-1">Leave empty to keep current image. Recommended size: 400x300 pixels</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $game->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <span class="ml-2">Active (visible to users)</span>
                </label>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">Update Game</button>
            </div>
        </form>
    </div>
</div>
@endsection
