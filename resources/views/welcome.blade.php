<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<div class="relative min-h-screen">
    <!-- Fun background elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-20 h-20 animate-float">
            {{-- Image removed --}}
        </div>
        <div class="absolute top-20 right-20 w-16 h-16 animate-float-delay-1">
            {{-- Image removed --}}
        </div>
        <div class="absolute bottom-20 left-1/4 w-24 h-24 animate-float-delay-2">
            {{-- Image removed --}}
        </div>
    </div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <h1 class="welcome-title">
            Bienvenue sur KidsLearning 
            <span class="inline-block animate-bounce-light">🎓</span>
        </h1>
        
        <p class="text-2xl text-center text-purple-700 mb-12 font-comic">
            Une plateforme amusante et éducative pour apprendre les couleurs, les nombres, les animaux et bien plus encore !
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Colors Card -->
            <div class="category-card colors">
                <div class="category-icon mb-4">
                    {{-- Image removed --}}
                </div>
                <h2 class="category-title text-red-600">Couleurs 🎨</h2>
                <p class="category-description">Apprenez les couleurs de manière amusante.</p>
                <a href="{{ route('colors.index') }}" class="btn btn-primary w-full text-center">
                    Explorer
                </a>
            </div>

            <!-- Numbers Card -->
            <div class="category-card numbers">
                <div class="category-icon mb-4">
                    {{-- Image removed --}}
                </div>
                <h2 class="category-title text-green-600">Nombres 🔢</h2>
                <p class="category-description">Apprenez les nombres avec des sons interactifs.</p>
                <a href="{{ route('numbers.index') }}" class="btn btn-primary w-full text-center">
                    Explorer
                </a>
            </div>

            <!-- Animals Card -->
            <div class="category-card animals">
                <div class="category-icon mb-4">
                    {{-- Image removed --}}
                </div>
                <h2 class="category-title text-blue-600">Animaux 🐾</h2>
                <p class="category-description">Découvrez les sons des animaux.</p>
                <a href="{{ route('animals.index') }}" class="btn btn-primary w-full text-center">
                    Explorer
                </a>
            </div>
        </div>
    </div>
</div>
@endsection