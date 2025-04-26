<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/numbers/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-center text-indigo-600">Les Nombres</h1>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @for($i = 1; $i <= 10; $i++)
            <div class="p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow relative cursor-pointer"
                 style="background-color: {{ [
                    '1' => '#FF6B6B',  // Rouge clair
                    '2' => '#4ECDC4',  // Turquoise
                    '3' => '#45B7D1',  // Bleu clair
                    '4' => '#96E6A1',  // Vert clair
                    '5' => '#FFD166',  // Jaune
                    '6' => '#FF9F1C',  // Orange
                    '7' => '#A78BFA',  // Violet
                    '8' => '#F472B6',  // Rose
                    '9' => '#60A5FA',  // Bleu
                    '10' => '#34D399'  // Vert émeraude
                ][$i] ?? '#F3F4F6' }};"
                 onclick="playNumberSound('{{ $i }}')">
                <div class="text-4xl font-bold text-center text-white mb-2">{{ $i }}</div>
                <div class="text-lg text-center mb-2">
                    <span class="font-semibold text-white">{{ $i }}</span>
                </div>
            </div>
        @endfor
    </div>
</div>

<script>
function playNumberSound(number) {
    try {
        const audioPath = `/audio/numbers/${number}.mp3`;
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
                alert('Le son n\'est pas disponible pour ce nombre.');
            });
    } catch (error) {
        console.error('Erreur lors de la lecture audio:', error);
        alert('Une erreur est survenue lors de la lecture du son.');
    }
}
</script>
@endsection