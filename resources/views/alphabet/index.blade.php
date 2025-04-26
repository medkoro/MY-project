<x-app-layout>
    <div class="alphabet-background py-12">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center text-blue-600">
                📚 Découvrons l'Alphabet !
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @foreach($alphabets as $item)
                    <div class="p-4 rounded-xl shadow text-center hover:scale-105 transition-transform"
                         style="background-color: {{ $item->color }};">
                        
                        <!-- Lettre majuscule -->
                        <div class="text-5xl font-extrabold mb-2 text-black">
                            {{ $item->letter }}
                        </div>

                        <!-- Lettre minuscule -->
                        <div class="text-2xl mb-1 lowercase text-black">
                            {{ strtolower($item->letter) }}
                        </div>

                        <!-- Mot associé -->
                        <p class="mb-4 font-semibold text-black">
                            {{ $item->word }}
                        </p>

                        <!-- 🔊 Bouton écouter -->
                        <button onclick="playSound('{{ strtolower($item->letter) }}')" 
                                class="mt-2 bg-white text-blue-500 font-bold py-1 px-4 rounded-full hover:bg-gray-100 transition-transform hover:scale-110">
                            🔊 Écouter
                        </button>
                    </div>
                @endforeach
            </div>

            <!-- Lecteur audio caché -->
            <audio id="audioPlayer"></audio>

            <script>
                function playSound(letter) {
                    const audio = document.getElementById('audioPlayer');
                    audio.src = `/audio/alphabets/${letter}.mp3`; // 🔥 corrigé ici !
                    audio.play();
                }
            </script>
        </div>
    </div>
</x-app-layout>
