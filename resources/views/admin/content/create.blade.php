@extends('admin.layouts.admin')

@section('content')
    <h2>Add New Content</h2>

    <form action="{{ route('admin.content.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
            <textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror" rows="5">{{ old('text') }}</textarea>
            @error('text')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image (Optional)</label>
            <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="audio">Audio (Optional)</label>
            <input type="file" name="audio" id="audio" class="form-control-file @error('audio') is-invalid @enderror">
            @error('audio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="video">Video (Optional)</label>
            <input type="file" name="video" id="video" class="form-control-file @error('video') is-invalid @enderror">
            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Content</button>
        <a href="{{ route('admin.content.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
