<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the quizzes.
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')->get();
        return view('admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new quiz.
     */
    public function create()
    {
        return view('admin.quizzes.create');
    }

    /**
     * Store a newly created quiz in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'difficulty' => 'required|integer|min:1|max:5',
            'is_active' => 'sometimes|boolean',
        ]);

        $quiz = Quiz::create($validated);

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Created quiz: ' . $quiz->title,
        ]);

        return redirect()->route('admin.quizzes.edit', $quiz)
            ->with('success', 'Quiz created successfully. Now add questions!');
    }

    /**
     * Show the form for editing the specified quiz.
     */
    public function edit(Quiz $quiz)
    {
        $quiz->load('questions');
        return view('admin.quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified quiz in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'difficulty' => 'required|integer|min:1|max:5',
            'is_active' => 'sometimes|boolean',
        ]);

        $quiz->update($validated);

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Updated quiz: ' . $quiz->title,
        ]);

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz updated successfully');
    }

    /**
     * Remove the specified quiz from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quizTitle = $quiz->title;
        $quiz->delete();

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Deleted quiz: ' . $quizTitle,
        ]);

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz deleted successfully');
    }

    /**
     * Add a question to a quiz.
     */
    public function addQuestion(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'question_text' => 'required|string',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'nullable|string|max:255',
            'correct_answer' => 'required|in:a,b,c,d',
            'question_image' => 'nullable|image|max:2048',
            'points' => 'required|integer|min:1',
        ]);

        $imagePath = null;
        if ($request->hasFile('question_image')) {
            $imagePath = $request->file('question_image')->store('question_images', 'public');
        }

        $question = new Question([
            'question_text' => $validated['question_text'],
            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'] ?? null,
            'correct_answer' => $validated['correct_answer'],
            'image_path' => $imagePath,
            'points' => $validated['points'],
        ]);

        $quiz->questions()->save($question);

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Added question to quiz: ' . $quiz->title,
        ]);

        return redirect()->route('admin.quizzes.edit', $quiz)
            ->with('success', 'Question added successfully');
    }

    /**
     * Delete a question.
     */
    public function deleteQuestion(Question $question)
    {
        $quiz = $question->quiz;
        
        // Delete image if exists
        if ($question->image_path) {
            Storage::disk('public')->delete($question->image_path);
        }
        
        $question->delete();

        // Log activity
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => 'Deleted question from quiz: ' . $quiz->title,
        ]);

        return redirect()->route('admin.quizzes.edit', $quiz)
            ->with('success', 'Question deleted successfully');
    }

    /**
     * Show quiz scores.
     */
    public function scores(Quiz $quiz)
    {
        $scores = Score::where('quiz_id', $quiz->id)
            ->with('user')
            ->orderByDesc('total_points')
            ->orderByDesc('created_at')
            ->paginate(20);
            
        return view('admin.quizzes.scores', compact('quiz', 'scores'));
    }
}
