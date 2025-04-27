@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center text-blue-600">Your Profile</h1>
        
        <div class="mb-6">
            <div class="flex items-center">
                <div class="bg-blue-100 rounded-full p-4 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                    <p class="text-sm text-gray-500">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 pt-6">
            <h3 class="text-xl font-semibold mb-4">Your Stats</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-blue-50 p-4 rounded-lg">
                    <h4 class="font-medium text-blue-800">Quizzes Taken</h4>
                    <p class="text-2xl font-bold">{{ Auth::user()->scores->count() }}</p>
                </div>
                <div class="bg-green-50 p-4 rounded-lg">
                    <h4 class="font-medium text-green-800">Best Score</h4>
                    <p class="text-2xl font-bold">
                        {{ Auth::user()->scores->max('score') ?? '0' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-6">
            <h3 class="text-xl font-semibold mb-4">Recent Activity</h3>
            @if(Auth::user()->scores->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-left">Quiz</th>
                                <th class="py-2 px-4 border-b text-left">Score</th>
                                <th class="py-2 px-4 border-b text-left">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->scores()->with('quiz')->latest()->take(5)->get() as $score)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $score->quiz->title ?? 'Deleted Quiz' }}</td>
                                    <td class="py-2 px-4 border-b">{{ $score->score }}</td>
                                    <td class="py-2 px-4 border-b">{{ $score->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500 italic">You haven't taken any quizzes yet.</p>
            @endif
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('quizzes.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-full inline-block transition">
                Take a Quiz
            </a>
        </div>
    </div>
</div>
@endsection
