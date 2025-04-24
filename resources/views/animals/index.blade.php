<!-- filepath: /resources/views/animals/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; font-family: 'Comic Sans MS', cursive, sans-serif; color: #FF5733; margin-bottom: 30px;">
        Apprendre les Animaux 🐾
    </h1>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; padding: 20px;">
        @foreach ($animals as $animal)
            <div style="text-align: center; border-radius: 15px; width: 200px; height: 250px; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); background-color: #f9f9f9; display: flex; flex-direction: column; align-items: center; justify-content: space-between; padding: 10px; transition: transform 0.3s, box-shadow 0.3s;">
                <!-- Image de l'animal -->
                <img src="{{ asset($animal->image_path) }}" alt="{{ $animal->name }}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 10px;">

                <!-- Nom de l'animal -->
                <p style="font-size: 18px; font-weight: bold; color: #333; margin: 10px 0;">{{ $animal->name }}</p>

                <!-- Bouton pour jouer le son -->
                <button 
                    style="padding: 10px 20px; background-color: #4CAF50; color: white; font-size: 16px; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;"
                    onmouseover="this.style.backgroundColor='#45a049';"
                    onmouseout="this.style.backgroundColor='#4CAF50';"
                    onclick="playSound('{{ asset($animal->audio_path) }}')">
                    Écouter
                </button>
            </div>
        @endforeach
    </div>

    <!-- Script pour jouer le son -->
    <script>
        function playSound(audioPath) {
            const audio = new Audio(audioPath);
            audio.play();
        }
    </script>
@endsection