@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="welcome-title text-center">Learning Adventure Map</h1>
    
    <div class="relative w-full max-w-5xl mx-auto mt-10 mb-16">
        <!-- Map Background -->
        <div class="bg-gradient-to-br from-blue-200 to-green-100 rounded-3xl p-6 shadow-xl relative overflow-hidden">
            
            <!-- Decorative Elements -->
            <div class="absolute top-10 left-10 text-5xl emoji-float" style="animation-delay: 0.2s;">🌍</div>
            <div class="absolute top-20 right-16 text-4xl emoji-float" style="animation-delay: 0.5s;">🚀</div>
            <div class="absolute bottom-12 left-20 text-4xl emoji-float" style="animation-delay: 0.8s;">🌈</div>
            <div class="absolute bottom-24 right-24 text-5xl emoji-float" style="animation-delay: 1.2s;">🌟</div>
            
            <!-- Paths (Curved lines connecting regions) -->
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1000 600" xmlns="http://www.w3.org/2000/svg">
                <path d="M250,150 C350,120 450,220 550,180" stroke="#9CA3AF" stroke-width="4" stroke-dasharray="8 4" fill="none"/>
                <path d="M550,180 C650,140 700,260 800,220" stroke="#9CA3AF" stroke-width="4" stroke-dasharray="8 4" fill="none"/>
                <path d="M250,150 C300,280 450,350 550,400" stroke="#9CA3AF" stroke-width="4" stroke-dasharray="8 4" fill="none"/>
                <path d="M550,400 C650,450 700,350 800,400" stroke="#9CA3AF" stroke-width="4" stroke-dasharray="8 4" fill="none"/>
                <path d="M250,350 C350,320 450,420 550,400" stroke="#9CA3AF" stroke-width="4" stroke-dasharray="8 4" fill="none"/>
            </svg>
            
            <!-- Learning Regions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10 py-8">
                
                <!-- Numbers Region -->
                <div class="category-card numbers transform hover:rotate-2 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-center mb-4">
                        <span class="text-6xl">123</span>
                    </div>
                    <h2 class="category-title">Numbers</h2>
                    <p class="category-description">Explore the world of numbers and counting</p>
                    <div class="flex justify-center">
                        <a href="{{ route('numbers.index') }}" class="btn btn-primary">Start Learning</a>
                    </div>
                </div>
                
                <!-- Colors Region -->
                <div class="category-card colors transform hover:rotate-2 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-center mb-4">
                        <span class="text-6xl">🎨</span>
                    </div>
                    <h2 class="category-title">Colors</h2>
                    <p class="category-description">Discover beautiful colors all around us</p>
                    <div class="flex justify-center">
                        <a href="{{ route('colors.index') }}" class="btn btn-primary">Start Learning</a>
                    </div>
                </div>
                
                <!-- Animals Region -->
                <div class="category-card animals transform hover:rotate-2 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-center mb-4">
                        <span class="text-6xl">🦁</span>
                    </div>
                    <h2 class="category-title">Animals</h2>
                    <p class="category-description">Meet amazing animals from around the world</p>
                    <div class="flex justify-center">
                        <a href="{{ route('animals.index') }}" class="btn btn-primary">Start Learning</a>
                    </div>
                </div>
                
                <!-- Quizzes Section -->
                <div class="category-card border-yellow-400 bg-gradient-to-br from-yellow-100 to-orange-100 transform hover:rotate-2 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-center mb-4">
                        <span class="text-6xl">🎯</span>
                    </div>
                    <h2 class="category-title">Quizzes</h2>
                    <p class="category-description">Test your knowledge with fun quizzes</p>
                    <div class="flex justify-center">
                        <a href="{{ route('quizzes.index') }}" class="btn btn-primary">Take a Quiz</a>
                    </div>
                </div>
                
                <!-- Interactive Games -->
                <div class="category-card border-purple-400 bg-gradient-to-br from-purple-100 to-pink-100 transform hover:rotate-2 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-center mb-4">
                        <span class="text-6xl">🎮</span>
                    </div>
                    <h2 class="category-title">Fun Games</h2>
                    <p class="category-description">Play interactive learning games</p>
                    <div class="flex justify-center mt-2">
                        <a href="#gamesList" class="btn btn-primary scroll-btn">Play Games</a>
                    </div>
                </div>
                
                <!-- Scoreboard -->
                <div class="category-card border-blue-400 bg-gradient-to-br from-blue-100 to-cyan-100 transform hover:rotate-2 hover:scale-105 transition-all duration-300">
                    <div class="flex justify-center mb-4">
                        <span class="text-6xl">🏆</span>
                    </div>
                    <h2 class="category-title">Scoreboard</h2>
                    <p class="category-description">See top scores and track your progress</p>
                    <div class="flex justify-center">
                        <a href="{{ route('scoreboard') }}" class="btn btn-primary">View Scores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Interactive Games List -->
    <div id="gamesList" class="mt-16 pt-8 pb-16">
        <h2 class="text-4xl font-bold text-center mb-10">Interactive Learning Games</h2>
        
        @if(isset($games) && $games->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($games as $game)
                    <div class="card hover-scale">
                        <div class="relative h-48 mb-4 rounded-xl overflow-hidden">
                            @if($game->image_path)
                                <img src="{{ asset('storage/' . $game->image_path) }}" alt="{{ $game->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-4xl">🎮</span>
                                </div>
                            @endif
                        </div>
                        <h3 class="text-2xl font-bold mb-2">{{ $game->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($game->description, 100) }}</p>
                        <div class="flex justify-end">
                            <a href="{{ $game->url }}" target="_blank" class="btn btn-primary">Play Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-xl text-gray-600">No games available yet. Check back soon!</p>
            </div>
        @endif
    </div>
</div>

<style>
    /* Path animation */
    @keyframes dashOffset {
        to {
            stroke-dashoffset: 20;
        }
    }
    
    svg path {
        animation: dashOffset 30s linear infinite;
    }
    
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Emoji float animation */
    .emoji-float {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
        100% { transform: translateY(0); }
    }
    
    /* Category cards styling */
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
    
    /* Button animation */
    .btn {
        transition: transform 0.2s ease;
    }
    
    .btn:hover {
        transform: translateY(-3px);
    }
    
    .btn:active {
        transform: translateY(1px);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add smooth scrolling to all links with scroll-btn class
        const scrollBtns = document.querySelectorAll('.scroll-btn');
        
        scrollBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>
@endsection
