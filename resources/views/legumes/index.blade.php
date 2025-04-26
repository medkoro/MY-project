@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8 text-green-600">Les Légumes</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($legumes as $legume)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                <div class="relative h-64">
                    <img src="{{ asset('images/les legumes/' . $legume->image) }}" 
                         alt="{{ $legume->name }}" 
                         class="w-full h-full object-contain p-4">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-center text-gray-800">{{ $legume->name }}</h3>
                    <p class="text-lg text-center text-gray-600 mb-4">{{ $legume->name_fr }}</p>
                    <button onclick="playLegumeSound('{{ $legume->sound }}')" 
                            class="w-full bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 transition-colors duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" />
                        </svg>
                        Écouter
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
function playLegumeSound(soundFile) {
    const audio = new Audio(`/audio/les legumes/${soundFile}`);
    audio.play();
}
</script>
@endsection 