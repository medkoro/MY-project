<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/numbers/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; font-family: 'Comic Sans MS', cursive, sans-serif; color: #FF5733; margin-bottom: 30px;">
        Apprendre les Nombres 🔢
    </h1>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; padding: 20px;">
        @foreach ($numbers as $number)
            <div style="text-align: center; border-radius: 50%; width: 150px; height: 150px; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); background-color: #{{ dechex(rand(0x100000, 0xFFFFFF)) }}; display: flex; align-items: center; justify-content: center; transition: transform 0.3s, box-shadow 0.3s;">
                <!-- Bouton pour jouer le son -->
                <button 
                    style="width: 100%; height: 100%; background: none; color: white; font-size: 40px; font-weight: bold; border: none; border-radius: 50%; cursor: pointer; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"
                    onmouseover="this.parentElement.style.transform='scale(1.1)'; this.parentElement.style.boxShadow='0 12px 20px rgba(0, 0, 0, 0.3)';"
                    onmouseout="this.parentElement.style.transform='scale(1)'; this.parentElement.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.2)';"
                    onclick="playSound('{{ asset($number->audio_path) }}')">
                    {{ $number->value }}
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