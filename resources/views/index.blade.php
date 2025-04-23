@extends('layouts.app')

@section('content')
    <h2>Categories</h2>
    @if($categories->isEmpty())
        <p>No categories found. Add some in the admin panel!</p>
    @else
        <ul class="categories-list">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('category.show', $category) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
