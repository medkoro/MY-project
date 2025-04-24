@extends('layouts.admin')

@section('admin-content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Modifier la Catégorie</h1>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Nom de la catégorie</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Annuler
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection