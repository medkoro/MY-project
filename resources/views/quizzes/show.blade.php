@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 text-center mb-4">
        <h1 class="display-4">{{ $quiz->title }}</h1>
        <p class="lead">{{ $quiz->description }}</p>
    </div>
</div>

<form action="{{ route('quizzes.submit', $quiz) }}" method="POST">
    @csrf
    <div class="row">
        @foreach($quiz->questions as $index => $question)
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Question {{ $index + 1 }}</h5>
                    <p class="card-text">{{ $question['question'] }}</p>
                    
                    <div class="form-check">
                        @foreach($question['options'] as $option)
                        <div class="mb-2">
                            <input class="form-check-input" type="radio" 
                                   name="answers[{{ $index }}]" 
                                   id="q{{ $index }}_{{ $loop->index }}" 
                                   value="{{ $option }}">
                            <label class="form-check-label" for="q{{ $index }}_{{ $loop->index }}">
                                {{ $option }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary btn-lg">Submit Answers</button>
    </div>
</form>
@endsection 