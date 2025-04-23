<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content - Admin</title>
    {{-- Basic Styling (similar to admin index) --}}
    <style>
        body { font-family: sans-serif; padding: 20px; font-size: 14px; }
        h1 { color: #555; }
        .container { max-width: 700px; margin: auto; background-color: #f9f9f9; padding: 30px; border-radius: 5px; border: 1px solid #eee; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], select, textarea, input[type="file"] {
            width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        button { background-color: #3498db; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #2980b9; }
        .error { color: #e74c3c; font-size: 0.9em; margin-top: -5px; margin-bottom: 10px; }
        .current-media { margin-bottom: 15px; font-size: 0.9em; }
        .current-media img, .current-media video { max-width: 200px; max-height: 150px; display: block; margin-top: 5px; }
        .current-media audio { width: 100%; max-width: 300px; margin-top: 5px; }
        .remove-media { margin-left: 10px; font-size: 0.9em; }
        .back-link { display: inline-block; margin-top: 20px; color: #555; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Content (ID: {{ $content->id }})</h1>

        @if (session('error'))
            <div class="error" style="background-color: #fdeded; padding: 10px; border: 1px solid #f5c6cb;">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.contents.update', $content) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $content->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div>
                <label for="text">Text Content:</label>
                <textarea id="text" name="text">{{ old('text', $content->text) }}</textarea>
                @error('text') <div class="error">{{ $message }}</div> @enderror
            </div>

            {{-- Image --}}
            <div>
                <label for="image">Image:</label>
                @if ($content->image_path)
                    <div class="current-media">
                        Current: <img src="{{ Storage::url($content->image_path) }}" alt="Current Image">
                        <label class="remove-media">
                            <input type="checkbox" name="remove_image" value="1"> Remove current image
                        </label>
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/*">
                <small>Upload a new file to replace the current one.</small>
                @error('image') <div class="error">{{ $message }}</div> @enderror
            </div>

            {{-- Audio --}}
             <div>
                <label for="audio">Audio:</label>
                 @if ($content->audio_path)
                    <div class="current-media">
                        Current: <audio controls src="{{ Storage::url($content->audio_path) }}"></audio>
                        <label class="remove-media">
                            <input type="checkbox" name="remove_audio" value="1"> Remove current audio
                        </label>
                    </div>
                @endif
                <input type="file" id="audio" name="audio" accept="audio/*">
                <small>Upload a new file to replace the current one.</small>
                 @error('audio') <div class="error">{{ $message }}</div> @enderror
            </div>

            {{-- Video --}}
             <div>
                <label for="video">Video:</label>
                 @if ($content->video_path)
                    <div class="current-media">
                        Current: <video controls width="200"><source src="{{ Storage::url($content->video_path) }}"></video>
                        <label class="remove-media">
                            <input type="checkbox" name="remove_video" value="1"> Remove current video
                        </label>
                    </div>
                @endif
                <input type="file" id="video" name="video" accept="video/*">
                <small>Upload a new file to replace the current one.</small>
                 @error('video') <div class="error">{{ $message }}</div> @enderror
            </div>

            <button type="submit">Update Content</button>
        </form>

        <a href="{{ route('admin.index') }}" class="back-link">&larr; Back to Admin Dashboard</a>
    </div>
</body>
</html>
