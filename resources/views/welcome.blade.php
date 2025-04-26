<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="welcome-title">
        Bienvenue sur KidsLearning 
        <span class="inline-block animate-bounce-light">🎓</span>
    </h1>
    
    <p class="text-2xl text-center text-purple-700 mb-12 font-comic">
        Une plateforme amusante et éducative pour apprendre les couleurs, les nombres, les animaux, les fruits, les légumes et les transports !
    </p>

    <!-- Première ligne : Couleurs, Nombres, Animaux -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-8">
        <!-- Colors Card -->
        <div class="category-card colors">
            <div class="category-icon">
                <span class="text-4xl">🎨</span>
            </div>
            <h2 class="category-title text-red-600">Couleurs</h2>
            <p class="category-description">Apprenez les couleurs de manière amusante.</p>
            <a href="{{ route('colors.index') }}" class="btn btn-primary">
                Explorer
            </a>
        </div>

        <!-- Numbers Card -->
        <div class="category-card numbers">
            <div class="category-icon">
                <span class="text-4xl">🔢</span>
            </div>
            <h2 class="category-title text-green-600">Nombres</h2>
            <p class="category-description">Apprenez les nombres avec des sons interactifs.</p>
            <a href="{{ route('numbers.index') }}" class="btn btn-primary">
                Explorer
            </a>
        </div>

        <!-- Animals Card -->
        <div class="category-card animals">
            <div class="category-icon">
                <span class="text-4xl">🐾</span>
            </div>
            <h2 class="category-title text-blue-600">Animaux</h2>
            <p class="category-description">Découvrez les sons des animaux.</p>
            <a href="{{ route('animals.index') }}" class="btn btn-primary">
                Explorer
            </a>
        </div>
    </div>

    <!-- Deuxième ligne : Fruits, Légumes, Transports -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-8">
        <!-- Fruits Card -->
        <div class="category-card" style="background-color: #FEF3C7; border: 2px solid #FCD34D; transition: all 0.3s ease;">
            <div class="category-icon">
                <span class="text-4xl">🍎</span>
            </div>
            <h2 class="category-title" style="color: #B45309;">Fruits</h2>
            <p class="category-description">Découvrez les fruits et leurs noms.</p>
            <a href="{{ route('fruits.index') }}" class="btn btn-primary">
                Explorer
            </a>
        </div>

        <!-- Legumes Card -->
        <div class="category-card" style="background-color: #D1FAE5; border: 2px solid #34D399; transition: all 0.3s ease;">
            <div class="category-icon">
                <span class="text-4xl">🥕</span>
            </div>
            <h2 class="category-title" style="color: #065F46;">Légumes</h2>
            <p class="category-description">Découvrez les légumes et leurs noms.</p>
            <a href="{{ route('legumes.index') }}" class="btn btn-primary">
                Explorer
            </a>
        </div>

        <!-- Transport Card -->
        <div class="category-card" style="background-color: #DBEAFE; border: 2px solid #60A5FA; transition: all 0.3s ease;">
            <div class="category-icon">
                <span class="text-4xl">🚗</span>
            </div>
            <h2 class="category-title" style="color: #1E40AF;">Transports</h2>
            <p class="category-description">Découvrez les différents moyens de transport.</p>
            <a href="{{ route('transport.index') }}" class="btn btn-primary">
                Explorer
            </a>
        </div>
    </div>

    <!-- Troisième ligne : Alphabet -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <!-- Alphabet Card -->
        <div class="category-card" style="background-color: #F3E8FF; border: 2px solid #A855F7; transition: all 0.3s ease;">
            <div class="category-icon">
                <span class="text-4xl">🔡</span>
            </div>
            <h2 class="category-title" style="color: #7E22CE;">Alphabet</h2>
            <p class="category-description">Découvrez l'alphabet.</p>
            <a href="{{ route('alphabet.index') }}" class="btn btn-primary">
                Explorer
            </a>
        </div>
    </div>
</div>

<style>
.welcome-title {
    font-size: 3rem;
    font-weight: bold;
    text-align: center;
    color: #4f46e5;
    margin-bottom: 2rem;
    font-family: 'Comic Sans MS', cursive;
}

.animate-bounce-light {
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.category-card {
    border-radius: 1rem;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.category-icon {
    margin-bottom: 1rem;
}

.category-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.category-description {
    color: #4B5563;
    margin-bottom: 1.5rem;
}

.btn-primary {
    background: #4f46e5;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: background 0.3s ease;
    display: inline-block;
    width: 100%;
    text-align: center;
}

.btn-primary:hover {
    background: #4338ca;
}
</style>

@push('styles')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush
@endsection