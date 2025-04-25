@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-4xl font-bold text-center mb-6">{{ $quiz->title }}</h1>
        
        <div class="card mb-8">
            <div class="mb-4">
                <p class="text-xl text-gray-700 mb-4">{{ $quiz->description }}</p>
                
                <div class="flex items-center mb-2">
                    <span class="mr-2 text-gray-700 font-bold">Category:</span>
                    <span class="badge bg-blue-100 text-blue-800 rounded-full px-3 py-1">{{ $quiz->category }}</span>
                </div>
                
                <div class="flex items-center mb-2">
                    <span class="mr-2 text-gray-700 font-bold">Difficulty:</span>
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
                
                <div class="flex items-center">
                    <span class="mr-2 text-gray-700 font-bold">Questions:</span>
                    <span>{{ $quiz->questions->count() }}</span>
                </div>
            </div>
            
            <div class="bg-blue-50 p-4 rounded-lg mb-6">
                <h3 class="text-xl font-bold text-blue-700 mb-2">How to Play:</h3>
                <ul class="list-disc list-inside text-blue-600 space-y-1">
                    <li>Read each question carefully</li>
                    <li>Select the best answer from the options</li>
                    <li>Click "Next" to move to the next question</li>
                    <li>Complete all questions to see your score</li>
                    <li>Have fun and learn something new!</li>
                </ul>
            </div>
            
            <div class="text-center">
                <a href="{{ route('quizzes.take', $quiz) }}" class="btn btn-primary text-xl py-4 px-8 animate-bounce-light">
                    Start Quiz Now!
                </a>
            </div>
        </div>
        
        <div class="flex justify-between">
            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">
                Back to Quizzes
            </a>
            <a href="{{ route('scoreboard') }}" class="btn btn-secondary">
                View Scoreboard
            </a>
        </div>
    </div>
</div>
@endsection
