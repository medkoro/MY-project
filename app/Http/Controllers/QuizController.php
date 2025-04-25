<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the quizzes.
     */
    public function index()
    {
        $quizzes = Quiz::where('is_active', true)->get();
        return view('quizzes.index', compact('quizzes'));
    }

    /**
     * Display the specified quiz.
     */
    public function show(Quiz $quiz)
    {
        $quiz->load('questions');
        return view('quizzes.show', compact('quiz'));
    }

    /**
     * Take the quiz.
     */
    public function take(Quiz $quiz)
    {
        $quiz->load('questions');
        return view('quizzes.take', compact('quiz'));
    }

    /**
     * Submit the quiz answers.
     */
    public function submit(Request $request, Quiz $quiz)
    {
        // Validate the request
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|in:a,b,c,d',
        ]);

        // Load questions
        $quiz->load('questions');
        $questions = $quiz->questions;

        // Calculate score
        $totalQuestions = $questions->count();
        $correctAnswers = 0;
        $totalPoints = 0;

        foreach ($questions as $question) {
            $questionId = $question->id;
            if (isset($request->answers[$questionId]) && $request->answers[$questionId] === $question->correct_answer) {
                $correctAnswers++;
                $totalPoints += $question->points;
            }
        }

        // Save score
        if (Auth::check()) {
            Score::create([
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
                'total_points' => $totalPoints,
                'questions_answered' => $totalQuestions,
                'questions_correct' => $correctAnswers,
            ]);
        }

        // Flash results
        session()->flash('quiz_results', [
            'total_questions' => $totalQuestions,
            'correct_answers' => $correctAnswers,
            'total_points' => $totalPoints,
        ]);

        return redirect()->route('quizzes.results', $quiz);
    }

    /**
     * Show the quiz results.
     */
    public function results(Quiz $quiz)
    {
        $results = session('quiz_results');
        
        if (!$results) {
            return redirect()->route('quizzes.index');
        }
        
        return view('quizzes.results', compact('quiz', 'results'));
    }

    /**
     * Display the scoreboard.
     */
    public function scoreboard()
    {
        $topScores = Score::with(['user', 'quiz'])
            ->orderByDesc('total_points')
            ->take(20)
            ->get();
            
        $userScores = null;
        if (Auth::check()) {
            $userScores = Score::where('user_id', Auth::id())
                ->with('quiz')
                ->orderByDesc('created_at')
                ->take(5)
                ->get();
        }
        
        return view('quizzes.scoreboard', compact('topScores', 'userScores'));
    }
}
