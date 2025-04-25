@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl font-bold text-center mb-8">Quiz Results</h1>
        
        <div class="card mb-8">
            <h2 class="text-2xl font-bold mb-6">{{ $quiz->title }}</h2>
            
            <div class="bg-blue-50 p-6 rounded-2xl mb-8">
                <div class="text-center">
                    <div class="text-6xl font-bold text-blue-600 mb-4">{{ $results['correct_answers'] }} / {{ $results['total_questions'] }}</div>
                    <div class="text-2xl font-bold">You scored {{ $results['total_points'] }} points!</div>
                    
                    @php
                        $percentage = ($results['correct_answers'] / $results['total_questions']) * 100;
                    @endphp
                    
                    <div class="w-full bg-gray-200 rounded-full h-6 mt-6">
                        <div class="h-6 rounded-full {{ $percentage >= 70 ? 'bg-green-500' : ($percentage >= 40 ? 'bg-yellow-500' : 'bg-red-500') }}" style="width: {{ $percentage }}%"></div>
                    </div>
                    
                    <div class="mt-6">
                        @if($percentage >= 80)
                            <div class="success-message">
                                <span class="text-2xl">🎉 Excellent! 🎉</span>
                                <p>You're a quiz superstar!</p>
                            </div>
                        @elseif($percentage >= 60)
                            <div class="success-message">
                                <span class="text-2xl">👍 Great job! 👍</span>
                                <p>You did really well!</p>
                            </div>
                        @elseif($percentage >= 40)
                            <div class="bg-yellow-100 text-yellow-600 p-6 rounded-2xl border-4 border-yellow-300 font-bold text-lg">
                                <span class="text-2xl">😊 Good effort! 😊</span>
                                <p>You're making progress!</p>
                            </div>
                        @else
                            <div class="bg-red-100 text-red-600 p-6 rounded-2xl border-4 border-red-300 font-bold text-lg">
                                <span class="text-2xl">🤔 Keep trying! 🤔</span>
                                <p>Don't give up, you'll get better!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            @auth
                <div class="text-center mb-6">
                    <p class="text-lg text-gray-600">Your score has been saved to the scoreboard!</p>
                </div>
            @else
                <div class="bg-yellow-50 p-4 rounded-lg text-center mb-6">
                    <p class="text-lg text-yellow-700">Sign in or register to save your scores and compete on the leaderboard!</p>
                    <div class="mt-3 flex justify-center space-x-4">
                        <a href="{{ route('login') }}" class="btn btn-secondary">Log In</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                    </div>
                </div>
            @endauth
            
            <div class="flex justify-between">
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Browse Quizzes</a>
                <a href="{{ route('quizzes.take', $quiz) }}" class="btn btn-primary">Try Again</a>
                <a href="{{ route('scoreboard') }}" class="btn btn-secondary">View Scoreboard</a>
            </div>
        </div>
    </div>
</div>
@endsection
