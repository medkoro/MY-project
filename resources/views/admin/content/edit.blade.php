@extends('admin.layouts.admin')

@section('content')
    <h2>Edit Content (ID: {{ $content->id }})</h2>

    <form action="{{ route('admin.content.update', $content) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Use PUT method for updates --}}

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $content->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="text">Text Content (Optional)</label>
            <textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror" rows="5">{{ old('text', $content->text) }}</textarea>
            @error('text')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Image Upload --}}
        <div class="form-group">
            <label for="image">Image (Optional - leave blank to keep current)</label>
            <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if($content->image_path)
                <div class="mt-2">
                    <p>Current Image:</p>
                    <img src="{{ Storage::url($content->image_path) }}" alt="Current Image" style="max-height: 100px;">
                </div>
            @endif
        </div>

        {{-- Audio Upload --}}
        <div class="form-group">
            <label for="audio">Audio (Optional - leave blank to keep current)</label>
            <input type="file" name="audio" id="audio" class="form-control-file @error('audio') is-invalid @enderror">
            @error('audio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if($content->audio_path)
                <div class="mt-2">
                    <p>Current Audio:</p>
                    <audio controls src="{{ Storage::url($content->audio_path) }}"></audio>
                </div>
            @endif
        </div>

        {{-- Video Upload --}}
        <div class="form-group">
            <label for="video">Video (Optional - leave blank to keep current)</label>
            <input type="file" name="video" id="video" class="form-control-file @error('video') is-invalid @enderror">
            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if($content->video_path)
                <div class="mt-2">
                    <p>Current Video:</p>
                    <video controls width="250" src="{{ Storage::url($content->video_path) }}"></video>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Content</button>
        <a href="{{ route('admin.content.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
