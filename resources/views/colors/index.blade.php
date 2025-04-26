<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/colors/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-center text-indigo-600">Les Couleurs</h1>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @php
            $colors = [
                ['name' => 'Rouge', 'name_fr' => 'Rouge', 'hex_code' => '#FF0000'],
                ['name' => 'Bleu', 'name_fr' => 'Bleu', 'hex_code' => '#0000FF'],
                ['name' => 'Vert', 'name_fr' => 'Vert', 'hex_code' => '#00FF00'],
                ['name' => 'Jaune', 'name_fr' => 'Jaune', 'hex_code' => '#FFFF00'],
                ['name' => 'Orange', 'name_fr' => 'Orange', 'hex_code' => '#FFA500'],
                ['name' => 'Violet', 'name_fr' => 'Violet', 'hex_code' => '#800080'],
                ['name' => 'Rose', 'name_fr' => 'Rose', 'hex_code' => '#FFC0CB'],
                ['name' => 'Marron', 'name_fr' => 'Marron', 'hex_code' => '#8B4513'],
                ['name' => 'Noir', 'name_fr' => 'Noir', 'hex_code' => '#000000'],
                ['name' => 'Blanc', 'name_fr' => 'Blanc', 'hex_code' => '#FFFFFF']
            ];
        @endphp

        @foreach($colors as $color)
            <div class="p-4 rounded-lg shadow-md text-center transition-transform hover:scale-105 relative cursor-pointer"
                 style="background-color: {{ $color['hex_code'] }}; color: {{ in_array($color['name'], ['Blanc', 'Jaune']) ? 'black' : 'white' }}"
                 onclick="playColorSound('{{ $color['name_fr'] }}')">
                <div class="font-bold mb-2">{{ $color['name'] }}</div>
                <div>{{ $color['name_fr'] }}</div>
            </div>
        @endforeach
    </div>
</div>

<script>
function playColorSound(colorName) {
    try {
        const audioPath = `/audio/colors/${colorName.toLowerCase()}.mp3`;
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
                alert('Le son n\'est pas disponible pour cette couleur.');
            });
    } catch (error) {
        console.error('Erreur lors de la lecture audio:', error);
        alert('Une erreur est survenue lors de la lecture du son.');
    }
}
</script>
@endsection