<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center text-green-600">🥦 Découvrons les Légumes !</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($legumes as $legume)
                <div class="group">
                    <div class="bg-white rounded-xl shadow-lg p-4 h-full transform transition duration-300 hover:scale-105">
                        
                        <!-- IMAGE du légume -->
                        <div class="aspect-w-16 aspect-h-9 mb-4">
                            <img src="{{ asset('images/les legumes/' . $legume['image']) }}" 
                                 alt="{{ $legume['name'] }}"
                                 class="w-full h-40 object-contain rounded-lg mx-auto">
                        </div>

                        <!-- NOM du légume -->
                        <div class="text-center">
                            <h2 class="text-xl font-bold text-green-700 mb-2">{{ $legume['name'] }}</h2>
                            
                            <!-- BOUTON écouter -->
                            <button onclick="playSound('{{ asset('audio/les legumes/' . $legume['sound']) }}')" 
                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition duration-300">
                                🔊 Écouter
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- SCRIPT pour jouer le son -->
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
