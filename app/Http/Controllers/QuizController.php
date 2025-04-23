<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        $userScores = QuizScore::where('user_id', Auth::id())->get();
        $totalPoints = $userScores->sum('score');
        
        return view('quizzes.index', compact('quizzes', 'totalPoints'));
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $score = 0;
        $answers = $request->input('answers', []);
        
        foreach ($quiz->questions as $index => $question) {
            if (isset($answers[$index]) && $answers[$index] === $question['correct_answer']) {
                $score++;
            }
        }

        QuizScore::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'score' => $score,
            'total_points' => count($quiz->questions)
        ]);

        return redirect()->route('quizzes.index')
            ->with('success', "You scored {$score} out of " . count($quiz->questions) . " points!");
    }
}
