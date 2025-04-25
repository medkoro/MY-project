@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Fun Quizzes</h1>
    
    <div class="flex justify-center mb-6">
        <a href="{{ route('scoreboard') }}" class="btn btn-secondary">View Scoreboard</a>
    </div>
    
    @if(session('success'))
        <div class="success-message mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    @if($quizzes->isEmpty())
        <div class="text-center py-8">
            <p class="text-xl text-gray-600">No quizzes available yet. Check back soon!</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($quizzes as $quiz)
                <div class="card hover-scale">
                    <h2 class="text-2xl font-bold mb-2">{{ $quiz->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $quiz->description }}</p>
                    
                    <div class="flex items-center mb-4">
                        <span class="mr-2 text-gray-700">Difficulty:</span>
                        <div class="flex">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $quiz->difficulty)
                                    <span class="text-yellow-500">★</span>
                                @else
                                    <span class="text-gray-300">★</span>
                                @endif
                            @endfor
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <span class="badge bg-blue-100 text-blue-800 rounded-full px-3 py-1">{{ $quiz->category }}</span>
                        <a href="{{ route('quizzes.show', $quiz) }}" class="btn btn-primary">Start Quiz</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
