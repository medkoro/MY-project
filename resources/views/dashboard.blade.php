@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Welcome, {{ Auth::user()->name }}!</h3>
                    
                    <div class="mt-4">
                        <h4>Quiz Test</h4>
                        <form id="quizForm">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">1. What is the capital of France?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" value="a">
                                    <label class="form-check-label">London</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" value="b">
                                    <label class="form-check-label">Paris</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" value="c">
                                    <label class="form-check-label">Berlin</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">2. What is 2 + 2?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" value="a">
                                    <label class="form-check-label">3</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" value="b">
                                    <label class="form-check-label">4</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" value="c">
                                    <label class="form-check-label">5</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Quiz</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('quizForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    let score = 0;
    const answers = {
        q1: 'b', // Paris
        q2: 'b'  // 4
    };

    for (let i = 1; i <= 2; i++) {
        const selectedAnswer = document.querySelector(`input[name="q${i}"]:checked`);
        if (selectedAnswer && selectedAnswer.value === answers[`q${i}`]) {
            score++;
        }
    }

    alert(`Your score: ${score}/2`);
});
</script>
@endsection 