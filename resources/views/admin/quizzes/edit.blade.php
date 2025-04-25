@extends('layouts.admin')

@section('title', 'Edit Quiz')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Edit Quiz: {{ $quiz->title }}</h1>
        <a href="{{ route('admin.quizzes.index') }}" class="btn btn-secondary">Back to Quizzes</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="card">
            <h2 class="text-xl font-bold mb-4">Quiz Details</h2>
            
            <form action="{{ route('admin.quizzes.update', $quiz) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="title" class="form-label">Quiz Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $quiz->title) }}" class="input-field" required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="3" class="input-field">{{ old('description', $quiz->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="input-field" required>
                        <option value="">Select a category</option>
                        <option value="Colors" {{ old('category', $quiz->category) == 'Colors' ? 'selected' : '' }}>Colors</option>
                        <option value="Numbers" {{ old('category', $quiz->category) == 'Numbers' ? 'selected' : '' }}>Numbers</option>
                        <option value="Animals" {{ old('category', $quiz->category) == 'Animals' ? 'selected' : '' }}>Animals</option>
                        <option value="Alphabet" {{ old('category', $quiz->category) == 'Alphabet' ? 'selected' : '' }}>Alphabet</option>
                        <option value="Shapes" {{ old('category', $quiz->category) == 'Shapes' ? 'selected' : '' }}>Shapes</option>
                        <option value="General Knowledge" {{ old('category', $quiz->category) == 'General Knowledge' ? 'selected' : '' }}>General Knowledge</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="difficulty" class="form-label">Difficulty Level (1-5)</label>
                    <div class="flex items-center space-x-1">
                        <input type="range" name="difficulty" id="difficulty" min="1" max="5" value="{{ old('difficulty', $quiz->difficulty) }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="difficultyValue.textContent = this.value">
                        <span id="difficultyValue" class="text-xl font-bold ml-4">{{ $quiz->difficulty }}</span>
                    </div>
                    @error('difficulty')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $quiz->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <span class="ml-2">Active (visible to users)</span>
                    </label>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">Update Quiz</button>
                </div>
            </form>
        </div>
        
        <div class="card">
            <h2 class="text-xl font-bold mb-4">Add New Question</h2>
            
            <form action="{{ route('admin.quizzes.questions.store', $quiz) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label for="question_text" class="form-label">Question Text</label>
                    <textarea name="question_text" id="question_text" rows="2" class="input-field" required>{{ old('question_text') }}</textarea>
                    @error('question_text')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="option_a" class="form-label">Option A</label>
                    <input type="text" name="option_a" id="option_a" value="{{ old('option_a') }}" class="input-field" required>
                    @error('option_a')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="option_b" class="form-label">Option B</label>
                    <input type="text" name="option_b" id="option_b" value="{{ old('option_b') }}" class="input-field" required>
                    @error('option_b')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="option_c" class="form-label">Option C</label>
                    <input type="text" name="option_c" id="option_c" value="{{ old('option_c') }}" class="input-field" required>
                    @error('option_c')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="option_d" class="form-label">Option D (Optional)</label>
                    <input type="text" name="option_d" id="option_d" value="{{ old('option_d') }}" class="input-field">
                    @error('option_d')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Correct Answer</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="correct_answer" value="a" {{ old('correct_answer') == 'a' ? 'checked' : '' }} class="text-blue-500" required>
                            <span class="ml-2">A</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="correct_answer" value="b" {{ old('correct_answer') == 'b' ? 'checked' : '' }} class="text-blue-500">
                            <span class="ml-2">B</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="correct_answer" value="c" {{ old('correct_answer') == 'c' ? 'checked' : '' }} class="text-blue-500">
                            <span class="ml-2">C</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="correct_answer" value="d" {{ old('correct_answer') == 'd' ? 'checked' : '' }} class="text-blue-500">
                            <span class="ml-2">D</span>
                        </label>
                    </div>
                    @error('correct_answer')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="question_image" class="form-label">Question Image (Optional)</label>
                    <input type="file" name="question_image" id="question_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('question_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="points" class="form-label">Points</label>
                    <input type="number" name="points" id="points" value="{{ old('points', 10) }}" min="1" max="100" class="input-field w-24" required>
                    @error('points')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="mt-8">
        <div class="card">
            <h2 class="text-xl font-bold mb-4">Quiz Questions ({{ $quiz->questions->count() }})</h2>
            
            @if($quiz->questions->isEmpty())
                <div class="text-center py-8">
                    <p class="text-xl text-gray-600">No questions added yet. Add questions using the form above.</p>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($quiz->questions as $index => $question)
                        <div class="border-2 border-gray-200 rounded-xl p-6 {{ $index % 2 === 0 ? 'bg-blue-50' : 'bg-green-50' }}">
                            <div class="flex justify-between items-start">
                                <h3 class="text-xl font-bold mb-2">Question {{ $index + 1 }}</h3>
                                <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            
                            <p class="text-lg mb-4">{{ $question->question_text }}</p>
                            
                            @if($question->image_path)
                                <div class="mb-4">
                                    <img src="{{ asset('storage/' . $question->image_path) }}" alt="Question Image" class="max-h-48 rounded-lg">
                                </div>
                            @endif
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                <div class="p-3 {{ $question->correct_answer === 'a' ? 'bg-green-100 border-green-500' : 'bg-white' }} border-2 rounded-lg">
                                    <span class="font-bold">A:</span> {{ $question->option_a }}
                                    @if($question->correct_answer === 'a')
                                        <span class="ml-2 text-green-600">✓</span>
                                    @endif
                                </div>
                                <div class="p-3 {{ $question->correct_answer === 'b' ? 'bg-green-100 border-green-500' : 'bg-white' }} border-2 rounded-lg">
                                    <span class="font-bold">B:</span> {{ $question->option_b }}
                                    @if($question->correct_answer === 'b')
                                        <span class="ml-2 text-green-600">✓</span>
                                    @endif
                                </div>
                                <div class="p-3 {{ $question->correct_answer === 'c' ? 'bg-green-100 border-green-500' : 'bg-white' }} border-2 rounded-lg">
                                    <span class="font-bold">C:</span> {{ $question->option_c }}
                                    @if($question->correct_answer === 'c')
                                        <span class="ml-2 text-green-600">✓</span>
                                    @endif
                                </div>
                                @if($question->option_d)
                                    <div class="p-3 {{ $question->correct_answer === 'd' ? 'bg-green-100 border-green-500' : 'bg-white' }} border-2 rounded-lg">
                                        <span class="font-bold">D:</span> {{ $question->option_d }}
                                        @if($question->correct_answer === 'd')
                                            <span class="ml-2 text-green-600">✓</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            
                            <div class="text-sm text-gray-600">
                                Points: <span class="font-bold">{{ $question->points }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
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
