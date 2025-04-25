@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">{{ $quiz->title }}</h1>
        
        <form action="{{ route('quizzes.submit', $quiz) }}" method="POST" id="quiz-form">
            @csrf
            
            <div class="card mb-6">
                <div class="mb-4 flex justify-between">
                    <span class="badge bg-blue-100 text-blue-800 rounded-full px-3 py-1">{{ $quiz->category }}</span>
                    <span class="text-gray-600">Question <span id="current-question">1</span> of {{ $quiz->questions->count() }}</span>
                </div>
                
                @foreach($quiz->questions as $index => $question)
                    <div class="question-container {{ $index > 0 ? 'hidden' : '' }}" data-question="{{ $index + 1 }}">
                        <h2 class="text-2xl font-bold mb-4">{{ $question->question_text }}</h2>
                        
                        @if($question->image_path)
                            <div class="mb-4 flex justify-center">
                                <img src="{{ asset('storage/' . $question->image_path) }}" alt="Question Image" class="max-h-64 rounded-lg">
                            </div>
                        @endif
                        
                        <div class="space-y-3 mb-6">
                            <label class="block p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-blue-50 transition-colors">
                                <input type="radio" name="answers[{{ $question->id }}]" value="a" class="mr-2">
                                <span class="text-lg">A: {{ $question->option_a }}</span>
                            </label>
                            
                            <label class="block p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-blue-50 transition-colors">
                                <input type="radio" name="answers[{{ $question->id }}]" value="b" class="mr-2">
                                <span class="text-lg">B: {{ $question->option_b }}</span>
                            </label>
                            
                            <label class="block p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-blue-50 transition-colors">
                                <input type="radio" name="answers[{{ $question->id }}]" value="c" class="mr-2">
                                <span class="text-lg">C: {{ $question->option_c }}</span>
                            </label>
                            
                            @if($question->option_d)
                                <label class="block p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-blue-50 transition-colors">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="d" class="mr-2">
                                    <span class="text-lg">D: {{ $question->option_d }}</span>
                                </label>
                            @endif
                        </div>
                        
                        <div class="flex justify-between">
                            @if($index > 0)
                                <button type="button" class="btn btn-secondary prev-question">Previous</button>
                            @else
                                <div></div>
                            @endif
                            
                            @if($index < $quiz->questions->count() - 1)
                                <button type="button" class="btn btn-primary next-question">Next</button>
                            @else
                                <button type="submit" class="btn btn-primary">Submit Quiz</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('quiz-form');
        const questions = document.querySelectorAll('.question-container');
        const currentQuestionEl = document.getElementById('current-question');
        
        document.querySelectorAll('.next-question').forEach(button => {
            button.addEventListener('click', function() {
                const currentQuestion = parseInt(currentQuestionEl.textContent);
                const nextQuestion = currentQuestion + 1;
                
                document.querySelector(`[data-question="${currentQuestion}"]`).classList.add('hidden');
                document.querySelector(`[data-question="${nextQuestion}"]`).classList.remove('hidden');
                
                currentQuestionEl.textContent = nextQuestion;
                
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
        
        document.querySelectorAll('.prev-question').forEach(button => {
            button.addEventListener('click', function() {
                const currentQuestion = parseInt(currentQuestionEl.textContent);
                const prevQuestion = currentQuestion - 1;
                
                document.querySelector(`[data-question="${currentQuestion}"]`).classList.add('hidden');
                document.querySelector(`[data-question="${prevQuestion}"]`).classList.remove('hidden');
                
                currentQuestionEl.textContent = prevQuestion;
                
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
        
        form.addEventListener('submit', function(e) {
            // Check if all questions are answered
            const questionIds = [];
            questions.forEach(question => {
                const questionId = question.querySelector('input').name.match(/\d+/)[0];
                if (!questionIds.includes(questionId)) {
                    questionIds.push(questionId);
                }
            });
            
            let allAnswered = true;
            questionIds.forEach(id => {
                const answered = document.querySelector(`input[name="answers[${id}]"]:checked`);
                if (!answered) {
                    allAnswered = false;
                }
            });
            
            if (!allAnswered) {
                e.preventDefault();
                alert('Please answer all questions before submitting.');
                
                // Go to the first unanswered question
                for (let i = 0; i < questionIds.length; i++) {
                    const id = questionIds[i];
                    const answered = document.querySelector(`input[name="answers[${id}]"]:checked`);
                    if (!answered) {
                        const questionEl = document.querySelector(`input[name="answers[${id}]"]`).closest('.question-container');
                        const questionNum = questionEl.dataset.question;
                        
                        questions.forEach(q => q.classList.add('hidden'));
                        questionEl.classList.remove('hidden');
                        currentQuestionEl.textContent = questionNum;
                        break;
                    }
                }
            }
        });
    });
</script>
@endsection
