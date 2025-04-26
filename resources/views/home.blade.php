@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-center text-indigo-600">Bienvenue sur Kids Learning</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Animaux -->
        <div class="group">
            <a href="{{ route('animals.index') }}" class="block h-full">
                <div class="bg-white rounded-xl shadow-lg p-4 h-full transform transition duration-300 hover:scale-105">
                    <div class="aspect-w-16 aspect-h-9 mb-4">
                        <img src="{{ asset('images/animals/chat.jpg') }}" 
                             alt="Animaux"
                             class="w-full h-full object-contain rounded-lg">
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Les Animaux</h2>
                    <p class="text-gray-600">Découvre les animaux et leurs cris</p>
                </div>
            </a>
        </div>

        <!-- Couleurs -->
        <div class="group">
            <a href="{{ route('colors.index') }}" class="block h-full">
                <div class="bg-white rounded-xl shadow-lg p-4 h-full transform transition duration-300 hover:scale-105">
                    <div class="aspect-w-16 aspect-h-9 mb-4">
                        <img src="{{ asset('images/colors/rouge.jpg') }}" 
                             alt="Couleurs"
                             class="w-full h-full object-contain rounded-lg">
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Les Couleurs</h2>
                    <p class="text-gray-600">Apprends les couleurs en français</p>
                </div>
            </a>
        </div>

        <!-- Nombres -->
        <div class="group">
            <a href="{{ route('numbers.index') }}" class="block h-full">
                <div class="bg-white rounded-xl shadow-lg p-4 h-full transform transition duration-300 hover:scale-105">
                    <div class="aspect-w-16 aspect-h-9 mb-4">
                        <img src="{{ asset('images/les nombres/1.jpg') }}" 
                             alt="Nombres"
                             class="w-full h-full object-contain rounded-lg">
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Les Nombres</h2>
                    <p class="text-gray-600">Apprends à compter en français</p>
                </div>
            </a>
        </div>

        <!-- Fruits -->
        <div class="group">
            <a href="{{ route('fruits.index') }}" class="block h-full">
                <div class="bg-white rounded-xl shadow-lg p-4 h-full transform transition duration-300 hover:scale-105">
                    <div class="aspect-w-16 aspect-h-9 mb-4">
                        <img src="{{ asset('images/les fruits/Pomme.jpg') }}" 
                             alt="Fruits"
                             class="w-full h-full object-contain rounded-lg">
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Les Fruits</h2>
                    <p class="text-gray-600">Découvre les fruits en français</p>
                </div>
            </a>
        </div>

        <!-- Transports -->
        <div class="group">
            <a href="{{ route('transport.index') }}" class="block h-full">
                <div class="bg-white rounded-xl shadow-lg p-4 h-full transform transition duration-300 hover:scale-105">
                    <div class="aspect-w-16 aspect-h-9 mb-4">
                        <img src="{{ asset('images/transport/Voiture.jpg') }}" 
                             alt="Transports"
                             class="w-full h-full object-contain rounded-lg">
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Les Transports</h2>
                    <p class="text-gray-600">Découvre les différents moyens de transport</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
