@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Scoreboard</h1>
    
    <div class="max-w-6xl mx-auto">
        @auth
            @if($userScores && $userScores->count() > 0)
                <div class="card mb-8">
                    <h2 class="text-2xl font-bold mb-4">Your Recent Scores</h2>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="table-header">
                                <tr>
                                    <th class="table-cell">Quiz</th>
                                    <th class="table-cell">Score</th>
                                    <th class="table-cell">Correct Answers</th>
                                    <th class="table-cell">Date</th>
                                    <th class="table-cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($userScores as $score)
                                    <tr class="table-row">
                                        <td class="table-cell font-medium">{{ $score->quiz->title }}</td>
                                        <td class="table-cell font-bold text-blue-600">{{ $score->total_points }} pts</td>
                                        <td class="table-cell">{{ $score->questions_correct }}/{{ $score->questions_answered }}</td>
                                        <td class="table-cell">{{ $score->created_at->format('M d, Y') }}</td>
                                        <td class="table-cell">
                                            <a href="{{ route('quizzes.take', $score->quiz) }}" class="btn btn-secondary btn-sm">Try Again</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @else
            <div class="bg-yellow-50 p-4 rounded-lg text-center mb-8">
                <p class="text-lg text-yellow-700">Sign in or register to track your scores and compete on the leaderboard!</p>
                <div class="mt-3 flex justify-center space-x-4">
                    <a href="{{ route('login') }}" class="btn btn-secondary">Log In</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                </div>
            </div>
        @endauth
        
        <div class="card">
            <h2 class="text-2xl font-bold mb-6">Top Scores</h2>
            
            @if($topScores->isEmpty())
                <div class="text-center py-8">
                    <p class="text-xl text-gray-600">No scores recorded yet. Be the first!</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="table-header">
                            <tr>
                                <th class="table-cell">Rank</th>
                                <th class="table-cell">Player</th>
                                <th class="table-cell">Quiz</th>
                                <th class="table-cell">Score</th>
                                <th class="table-cell">Correct Answers</th>
                                <th class="table-cell">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($topScores as $index => $score)
                                <tr class="table-row {{ auth()->check() && $score->user_id === auth()->id() ? 'bg-blue-50' : '' }}">
                                    <td class="table-cell">
                                        @if($index < 3)
                                            <span class="inline-flex items-center justify-center {{ $index === 0 ? 'bg-yellow-400' : ($index === 1 ? 'bg-gray-300' : 'bg-yellow-600') }} text-white w-8 h-8 rounded-full font-bold">{{ $index + 1 }}</span>
                                        @else
                                            {{ $index + 1 }}
                                        @endif
                                    </td>
                                    <td class="table-cell font-medium">{{ $score->user->name }}</td>
                                    <td class="table-cell">{{ $score->quiz->title }}</td>
                                    <td class="table-cell font-bold text-blue-600">{{ $score->total_points }} pts</td>
                                    <td class="table-cell">{{ $score->questions_correct }}/{{ $score->questions_answered }}</td>
                                    <td class="table-cell">{{ $score->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        
        <div class="mt-6 flex justify-between">
            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Back to Quizzes</a>
        </div>
    </div>
</div>
@endsection
