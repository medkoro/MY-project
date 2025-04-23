@extends('layouts.app')

@section('content')
    <h2>{{ $category->name }}</h2>

    @if($category->contents->isEmpty())
        <p>No content found in this category yet.</p>
    @else
        @foreach($category->contents as $content)
            <div class="content-item">
                @if($content->text)
                    <p>{{ $content->text }}</p>
                @endif
                @if($content->image_path)
                    <img src="{{ Storage::url($content->image_path) }}" alt="Image content">
                @endif
                @if($content->audio_path)
                    <audio controls src="{{ Storage::url($content->audio_path) }}">
                        Your browser does not support the audio element.
                    </audio>
                @endif
                @if($content->video_path)
                    <video controls width="400" src="{{ Storage::url($content->video_path) }}">
                        Your browser does not support the video tag.
                    </video>
                @endif
            </div>
        @endforeach
    @endif

    <p><a href="{{ route('home') }}">&laquo; Back to Categories</a></p>
@endsection
