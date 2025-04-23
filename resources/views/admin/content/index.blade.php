@extends('admin.layouts.admin')

@section('content')
    <h2>Manage Content</h2>

    <div class="text-right mb-3">
        <a href="{{ route('admin.content.create') }}" class="btn btn-primary">Add New Content</a>
    </div>

    @if($contents->isEmpty())
        <p>No content found. <a href="{{ route('admin.content.create') }}">Add some!</a></p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Text (Excerpt)</th>
                    <th>Media</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                    <tr>
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->category->name ?? 'N/A' }}</td>
                        <td>{{ Str::limit($content->text, 50) }}</td>
                        <td>
                            @if($content->image_path) <span class="badge badge-secondary">Image</span> @endif
                            @if($content->audio_path) <span class="badge badge-secondary">Audio</span> @endif
                            @if($content->video_path) <span class="badge badge-secondary">Video</span> @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.content.edit', $content) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.content.destroy', $content) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this content?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination Links --}}
        {{ $contents->links() }}
    @endif
@endsection
