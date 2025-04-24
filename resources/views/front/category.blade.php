@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center mb-8">
        <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <h1 class="text-3xl font-bold text-gray-800">{{ $category->name }}</h1>
    </div>

    <p class="text-gray-600 mb-8">{{ $category->description }}</p>

    @if($category->contents->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($category->contents as $content)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            @if($content->image_path)
            <div class="h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $content->image_path) }}" alt="{{ $content->title }}" class="w-full h-full object-cover">
            </div>
            @endif
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $content->title }}</h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($content->description, 100) }}</p>
                <a href="{{ route('content', $content) }}" class="text-blue-500 hover:text-blue-700 font-medium flex items-center">
                    Voir plus
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm text-blue-700">
                    Aucun contenu disponible pour cette catégorie pour le moment.
                </p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection