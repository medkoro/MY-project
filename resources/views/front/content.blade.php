@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <nav class="flex items-center text-sm mb-8">
        <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700">Accueil</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <a href="{{ route('category', $content->category->slug) }}" class="text-blue-500 hover:text-blue-700">{{ $content->category->name }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-gray-600">{{ $content->title }}</span>
    </nav>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        @if($content->image_path)
        <div class="h-64 md:h-96 overflow-hidden">
            <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="w-full h-full object-cover">
        </div>
        @endif

        <div class="p-6 md:p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $content->title }}</h1>
            
            <div class="prose max-w-none text-gray-600 mb-6">
                {!! nl2br(e($content->description)) !!}
            </div>

            @if($content->audio_path)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Audio</h3>
                <audio controls class="w-full">
                    <source src="{{ asset('storage/' . $content->audio_path) }}" type="audio/mpeg">
                    Votre navigateur ne supporte pas l'élément audio.
                </audio>
            </div>
            @endif

            @if($content->video_path)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Vidéo</h3>
                <video controls class="w-full rounded-lg">
                    <source src="{{ asset('storage/' . $content->video_path) }}" type="video/mp4">
                    Votre navigateur ne supporte pas l'élément vidéo.
                </video>
            </div>
            @endif

            <div class="flex items-center justify-between border-t pt-4 mt-6">
                <a href="{{ route('category', $content->category->slug) }}" class="text-blue-500 hover:text-blue-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Retour à la catégorie
                </a>
                <span class="text-sm text-gray-500">Mis à jour le {{ $content->updated_at->format('d/m/Y') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection