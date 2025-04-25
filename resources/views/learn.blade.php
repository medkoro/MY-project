@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="welcome-title text-center mb-10">Learning Resources</h1>
    
    <div class="max-w-5xl mx-auto">
        <!-- Learning Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Colors -->
            <div class="category-card border-red-400 bg-gradient-to-br from-red-50 to-pink-50 transform hover:rotate-2 hover:scale-105 transition-all duration-300">
                <div class="flex justify-center mb-4">
                    <span class="text-6xl">🎨</span>
                </div>
                <h2 class="category-title">Colors</h2>
                <p class="category-description">Learn to identify and name different colors</p>
                <div class="flex justify-center">
                    <a href="{{ route('colors.index') }}" class="btn btn-primary">Explore Colors</a>
                </div>
            </div>
            
            <!-- Numbers -->
            <div class="category-card border-blue-400 bg-gradient-to-br from-blue-50 to-indigo-50 transform hover:rotate-2 hover:scale-105 transition-all duration-300">
                <div class="flex justify-center mb-4">
                    <span class="text-6xl">123</span>
                </div>
                <h2 class="category-title">Numbers</h2>
                <p class="category-description">Count and learn numbers the fun way</p>
                <div class="flex justify-center">
                    <a href="{{ route('numbers.index') }}" class="btn btn-primary">Explore Numbers</a>
                </div>
            </div>
            
            <!-- Animals -->
            <div class="category-card border-green-400 bg-gradient-to-br from-green-50 to-emerald-50 transform hover:rotate-2 hover:scale-105 transition-all duration-300">
                <div class="flex justify-center mb-4">
                    <span class="text-6xl">🦁</span>
                </div>
                <h2 class="category-title">Animals</h2>
                <p class="category-description">Discover amazing animals and their sounds</p>
                <div class="flex justify-center">
                    <a href="{{ route('animals.index') }}" class="btn btn-primary">Explore Animals</a>
                </div>
            </div>
        </div>
        
        <!-- Learning Tips Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-center mb-8">Learning Tips for Parents</h2>
            
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <div class="bg-blue-100 rounded-full p-3 mr-4">
                            <span class="text-2xl">🕒</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Keep it Short</h3>
                            <p>Young children have short attention spans. Limit learning sessions to 15-20 minutes.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-green-100 rounded-full p-3 mr-4">
                            <span class="text-2xl">🎮</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Make it Fun</h3>
                            <p>Learning should be playful. Use games, songs, and interactive activities.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-yellow-100 rounded-full p-3 mr-4">
                            <span class="text-2xl">👏</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Praise Efforts</h3>
                            <p>Celebrate progress and effort, not just correct answers.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <span class="text-2xl">🔁</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Repetition is Key</h3>
                            <p>Children learn through repetition. Review concepts regularly in different ways.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Daily Learning Activities -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-center mb-8">Daily Learning Activities</h2>
            
            <div class="space-y-6">
                <div class="bg-gradient-to-r from-pink-50 to-red-50 p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-bold mb-2">Monday: Colors Day</h3>
                    <p class="mb-4">Focus on identifying colors around your home. Play "I Spy" with colors!</p>
                    <a href="{{ route('colors.index') }}" class="text-blue-600 hover:underline">Start with our Colors lessons →</a>
                </div>
                
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-bold mb-2">Tuesday: Counting Time</h3>
                    <p class="mb-4">Practice counting everyday objects like toys, fruit, or buttons.</p>
                    <a href="{{ route('numbers.index') }}" class="text-blue-600 hover:underline">Try our Numbers lessons →</a>
                </div>
                
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-bold mb-2">Wednesday: Animal Adventures</h3>
                    <p class="mb-4">Learn about animals, their sounds, and habitats.</p>
                    <a href="{{ route('animals.index') }}" class="text-blue-600 hover:underline">Explore our Animals lessons →</a>
                </div>
                
                <div class="bg-gradient-to-r from-purple-50 to-violet-50 p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-bold mb-2">Thursday: Quiz Day</h3>
                    <p class="mb-4">Test knowledge with fun quizzes and interactive games.</p>
                    <a href="{{ route('quizzes.index') }}" class="text-blue-600 hover:underline">Try our quizzes →</a>
                </div>
                
                <div class="bg-gradient-to-r from-amber-50 to-yellow-50 p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-bold mb-2">Friday: Game Time</h3>
                    <p class="mb-4">Enjoy interactive learning games that reinforce the week's concepts.</p>
                    <a href="{{ route('games') }}" class="text-blue-600 hover:underline">Play our games →</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .category-card {
        @apply rounded-xl p-6 shadow-lg border-4 bg-white;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .category-card:hover {
        @apply shadow-2xl;
        transform: translateY(-10px) rotate(1deg);
    }

    .category-title {
        @apply text-2xl font-bold text-center mb-2;
    }

    .category-description {
        @apply text-gray-600 text-center mb-4;
    }
</style>
@endsection
