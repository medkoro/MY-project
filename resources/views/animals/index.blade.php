<!-- filepath: /resources/views/animals/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-center text-indigo-600">Les Animaux</h1>
                    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($animals as $animal)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:scale-105"
                 onclick="playAnimalSound('{{ $animal->name_fr }}')">
                <div class="relative">
                                @if($animal->image_path)
                        <div class="w-full">
                                    <img src="{{ asset($animal->image_path) }}" 
                                         alt="{{ $animal->name }}"
                                 class="w-full h-auto object-contain brightness-100 hover:brightness-110 transition-all duration-300">
                                </div>
                    @else
                        <div class="w-full h-72 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">Image non disponible</span>
                            </div>
                    @endif
                    <div class="absolute top-2 right-2 bg-white bg-opacity-80 rounded-full p-2 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M18 3a1 1 0 00-1.447-.894l-8 4A1 1 0 008 8v4a1 1 0 00.553.894l8 4A1 1 0 0018 16V3z" />
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $animal->name }}</h3>
                    <p class="text-gray-600 text-sm">{{ $animal->description_fr }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
function playAnimalSound(animalName) {
    try {
        const audioPath = `/audio/animals/${animalName.toLowerCase()}.mp3`;
        const audio = new Audio(audioPath);
        
        // Vérifier si le fichier audio existe
        fetch(audioPath)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Fichier audio non trouvé');
                }
                return audio.play();
            })
            .catch(error => {
                console.error('Erreur lors de la lecture audio:', error);
                alert('Le son n\'est pas disponible pour cet animal.');
            });
    } catch (error) {
        console.error('Erreur lors de la lecture audio:', error);
        alert('Une erreur est survenue lors de la lecture du son.');
    }
}
</script>
@endsection