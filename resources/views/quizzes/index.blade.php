@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 text-center mb-4">
        <h1 class="display-4">Fun Learning Quizzes! 🎓</h1>
        <p class="lead">Test your knowledge and earn points!</p>
    </div>
</div>

<div class="row">
    @foreach($quizzes as $quiz)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $quiz->title }}</h5>
                <p class="card-text">{{ $quiz->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge bg-primary">Points: {{ $quiz->points }}</span>
                    <a href="{{ route('quizzes.show', $quiz) }}" class="btn btn-primary">Start Quiz</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endsection 