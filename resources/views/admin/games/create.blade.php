@extends('layouts.admin')

@section('title', 'Create Game')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Create New Game</h1>
        <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Back to Games</a>
    </div>
    
    <div class="card">
        <form action="{{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="form-label">Game Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="input-field" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="3" class="input-field" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="url" class="form-label">Game URL</label>
                <input type="url" name="url" id="url" value="{{ old('url') }}" class="input-field" required>
                <p class="text-sm text-gray-500 mt-1">URL to the external game or interactive content</p>
                @error('url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="image" class="form-label">Game Image</label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-sm text-gray-500 mt-1">Recommended size: 400x300 pixels</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} class="rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <span class="ml-2">Active (visible to users)</span>
                </label>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">Create Game</button>
            </div>
        </form>
    </div>
</div>
@endsection
