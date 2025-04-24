@extends('layouts.admin')

@section('admin-content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Modifier le Contenu</h1>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ route('admin.contents.update', $content) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Titre</label>
            <input type="text" name="title" id="title" value="{{ old('title', $content->title) }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-medium mb-2">Catégorie</label>
            <select name="category_id" id="category_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $content->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description', $content->description) }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Image actuelle</label>
                @if($content->image_path)
                    <img src="{{ asset('storage/' . $content->image_path) }}" alt="Image actuelle" class="h-20 mb-2">
                @else
                    <p class="text-gray-500">Aucune image</p>
                @endif
                <label for="image" class="block text-gray-700 font-medium mb-2">Nouvelle image</label>
                <input type="file" name="image" id="image" class="w-full">
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Audio actuel</label>
                @if($content->audio_path)
                    <audio controls class="mb-2">
                        <source src="{{ asset('storage/' . $content->audio_path) }}" type="audio/mpeg">
                    </audio>
                @else
                    <p class="text-gray-500">Aucun audio</p>
                @endif
                <label for="audio" class="block text-gray-700 font-medium mb-2">Nouvel audio</label>
                <input type="file" name="audio" id="audio" class="w-full">
                @error('audio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Vidéo actuelle</label>
                @if($content->video_path)
                    <video controls class="h-20 mb-2">
                        <source src="{{ asset('storage/' . $content->video_path) }}" type="video/mp4">
                    </video>
                @else
                    <p class="text-gray-500">Aucune vidéo</p>
                @endif
                <label for="video" class="block text-gray-700 font-medium mb-2">Nouvelle vidéo</label>
                <input type="file" name="video" id="video" class="w-full">
                @error('video')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.contents.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Annuler
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection