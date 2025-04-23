@extends('admin.layouts.admin')

@section('content')
    <h2>Add New Category</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
        <a href="{{ route('admin.content.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
