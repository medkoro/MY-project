<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center text-indigo-600">🚗 Découvrons les Transports !</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $transports = [
                    ['name' => 'Voiture', 'image' => 'Voiture.jpg', 'sound' => 'Voiture.mp3', 'bg' => 'bg-red-100'],
                    ['name' => 'Bus', 'image' => 'Bus.jpg', 'sound' => 'Bus.mp3', 'bg' => 'bg-yellow-100'],
                    ['name' => 'Train', 'image' => 'Train.jpg', 'sound' => 'Train.mp3', 'bg' => 'bg-blue-100'],
                    ['name' => 'Avion', 'image' => 'Avion.jpg', 'sound' => 'Avion.mp3', 'bg' => 'bg-purple-100'],
                    ['name' => 'Bateau', 'image' => 'Bateau.jpg', 'sound' => 'Bateau.mp3', 'bg' => 'bg-green-100'],
                    ['name' => 'Moto', 'image' => 'Moto.jpg', 'sound' => 'Moto.mp3', 'bg' => 'bg-pink-100'],
                ];
            @endphp

            @foreach($transports as $transport)
                <div class="rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 {{ $transport['bg'] }}">
                    
                    <!-- IMAGE du transport -->
                    <div class="p-4">
                        <img src="{{ asset('images/transport/' . $transport['image']) }}" 
                             alt="{{ $transport['name'] }}"
                             class="w-full h-48 object-contain rounded-lg mx-auto">
                    </div>

                    <!-- NOM + bouton -->
                    <div class="p-4 text-center">
                        <h2 class="text-2xl font-bold text-indigo-700 mb-4">{{ $transport['name'] }}</h2>

                        <!-- BOUTON écouter dans un badge blanc -->
                        <div class="inline-block bg-white rounded-full shadow px-4 py-2">
                            <button onclick="playSound('{{ asset('audio/transport/' . $transport['sound']) }}')" 
                                    class="text-indigo-500 font-semibold hover:text-indigo-600 transition">
                                🔊 Écouter
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    <script>
    let audio = null;
    function playSound(soundFile) {
        if (audio) {
            audio.pause();
        }
        audio = new Audio(soundFile);
        audio.play();
    }
    </script>
</x-app-layout>
