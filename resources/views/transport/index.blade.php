@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-center text-indigo-600">Les Transports</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
            $transports = [
                ['name' => 'Voiture', 'name_fr' => 'Voiture', 'image' => 'Voiture.jpg', 'sound' => 'Voiture.mp3'],
                ['name' => 'Bus', 'name_fr' => 'Bus', 'image' => 'Bus.jpg', 'sound' => 'Bus.mp3'],
                ['name' => 'Train', 'name_fr' => 'Train', 'image' => 'Train.jpg', 'sound' => 'Train.mp3'],
                ['name' => 'Avion', 'name_fr' => 'Avion', 'image' => 'Avion.jpg', 'sound' => 'Avion.mp3'],
                ['name' => 'Bateau', 'name_fr' => 'Bateau', 'image' => 'Bateau.jpg', 'sound' => 'Bateau.mp3'],
                ['name' => 'Moto', 'name_fr' => 'Moto', 'image' => 'Moto.jpg', 'sound' => 'Moto.mp3']
            ];
        @endphp

        @foreach($transports as $transport)
        <div class="group">
            <div class="bg-white rounded-xl shadow-lg p-4 h-full transform transition duration-300 hover:scale-105">
                <div class="aspect-w-16 aspect-h-9 mb-4">
                    <img src="{{ asset('images/transport/' . $transport['image']) }}" 
                         alt="{{ $transport['name_fr'] }}"
                         class="w-full h-full object-contain rounded-lg">
                </div>
                <div class="text-center">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $transport['name_fr'] }}</h2>
                    <button onclick="playSound('{{ asset('audio/transport/' . $transport['sound']) }}')" 
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                        Écouter
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
function playSound(soundFile) {
    const audio = new Audio(soundFile);
    audio.play();
}
</script>
@endsection 