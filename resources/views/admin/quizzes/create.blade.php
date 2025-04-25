@extends('layouts.admin')

@section('title', 'Create Quiz')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Create New Quiz</h1>
        <a href="{{ route('admin.quizzes.index') }}" class="btn btn-secondary">Back to Quizzes</a>
    </div>
    
    <div class="card">
        <form action="{{ route('admin.quizzes.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="form-label">Quiz Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="input-field" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="3" class="input-field">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="input-field" required>
                    <option value="">Select a category</option>
                    <option value="Colors" {{ old('category') == 'Colors' ? 'selected' : '' }}>Colors</option>
                    <option value="Numbers" {{ old('category') == 'Numbers' ? 'selected' : '' }}>Numbers</option>
                    <option value="Animals" {{ old('category') == 'Animals' ? 'selected' : '' }}>Animals</option>
                    <option value="Alphabet" {{ old('category') == 'Alphabet' ? 'selected' : '' }}>Alphabet</option>
                    <option value="Shapes" {{ old('category') == 'Shapes' ? 'selected' : '' }}>Shapes</option>
                    <option value="General Knowledge" {{ old('category') == 'General Knowledge' ? 'selected' : '' }}>General Knowledge</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="difficulty" class="form-label">Difficulty Level (1-5)</label>
                <div class="flex items-center space-x-1">
                    <input type="range" name="difficulty" id="difficulty" min="1" max="5" value="{{ old('difficulty', 1) }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="difficultyValue.textContent = this.value">
                    <span id="difficultyValue" class="text-xl font-bold ml-4">1</span>
                </div>
                @error('difficulty')
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
                <button type="submit" class="btn btn-primary">Create Quiz</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const difficultySlider = document.getElementById('difficulty');
        const difficultyValue = document.getElementById('difficultyValue');
        
        // Initialize with current value
        difficultyValue.textContent = difficultySlider.value;
        
        // Update when slider changes
        difficultySlider.addEventListener('input', function() {
            difficultyValue.textContent = this.value;
        });
    });
</script>
@endsection
