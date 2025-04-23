<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    {{-- Basic Styling --}}
    <style>
        body { font-family: sans-serif; padding: 20px; font-size: 14px; }
        h1, h2 { color: #555; }
        .container { max-width: 1000px; margin: auto; }
        .section { background-color: #f9f9f9; padding: 20px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #eee; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], select, textarea, input[type="file"] {
            width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        button { background-color: #3498db; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #2980b9; }
        .error { color: #e74c3c; font-size: 0.9em; margin-top: -5px; margin-bottom: 10px; }
        .success { color: #2ecc71; background-color: #eafaf1; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #bcf0d5;}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .actions form { display: inline-block; margin-right: 5px; }
        .actions button { padding: 5px 8px; font-size: 0.9em; }
        .delete-button { background-color: #e74c3c; }
        .delete-button:hover { background-color: #c0392b; }
        .edit-button { background-color: #f39c12; }
        .edit-button:hover { background-color: #e67e22; }
        .media-preview { max-width: 50px; max-height: 50px; vertical-align: middle; margin-right: 5px;}
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="error" style="background-color: #fdeded; padding: 10px; border: 1px solid #f5c6cb;">{{ session('error') }}</div>
        @endif

        {{-- Add New Category --}}
        <div class="section">
            <h2>Add New Category</h2>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Category Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name') <div class="error">{{ $message }}</div> @enderror
                </div>
                <button type="submit">Add Category</button>
            </form>
        </div>

        {{-- Add New Content --}}
        <div class="section">
            <h2>Add New Content</h2>
            <form action="{{ route('admin.contents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="category_id">Category:</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="text">Text Content:</label>
                    <textarea id="text" name="text">{{ old('text') }}</textarea>
                    @error('text') <div class="error">{{ $message }}</div> @enderror
                </div>
                 <div>
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    @error('image') <div class="error">{{ $message }}</div> @enderror
                </div>
                 <div>
                    <label for="audio">Audio:</label>
                    <input type="file" id="audio" name="audio" accept="audio/*">
                     @error('audio') <div class="error">{{ $message }}</div> @enderror
                </div>
                 <div>
                    <label for="video">Video:</label>
                    <input type="file" id="video" name="video" accept="video/*">
                     @error('video') <div class="error">{{ $message }}</div> @enderror
                </div>
                <button type="submit">Add Content</button>
            </form>
        </div>

        {{-- Manage Content --}}
        <div class="section">
            <h2>Manage Content</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Text</th>
                        <th>Image</th>
                        <th>Audio</th>
                        <th>Video</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contents as $content)
                        <tr>
                            <td>{{ $content->id }}</td>
                            <td>{{ $content->category->name ?? 'N/A' }}</td>
                            <td>{{ Str::limit($content->text, 50) }}</td>
                            <td>
                                @if($content->image_path)
                                <img src="{{ Storage::url($content->image_path) }}" alt="Image" class="media-preview">
                                @endif
                            </td>
                            <td>@if($content->audio_path) &#10004; @endif</td> {{-- Checkmark for audio --}}
                            <td>@if($content->video_path) &#10004; @endif</td> {{-- Checkmark for video --}}
                            <td class="actions">
                                <a href="{{ route('admin.contents.edit', $content) }}" class="edit-button">Edit</a>
                                <form action="{{ route('admin.contents.destroy', $content) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this content?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No content added yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
