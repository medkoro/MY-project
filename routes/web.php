<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\LearningController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\DatabaseManagerController;
use App\Http\Controllers\AlphabetController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\LegumeController;

// Front Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/colors', [ColorController::class, 'index'])->name('colors.index');
Route::get('/numbers', [NumberController::class, 'index'])->name('numbers.index');
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
Route::get('/alphabet', [AlphabetController::class, 'index'])->name('alphabet.index');
Route::get('/transport', [TransportController::class, 'index'])->name('transport.index');
Route::get('/fruits', [FruitController::class, 'index'])->name('fruits.index');
Route::get('/legumes', [LegumeController::class, 'index'])->name('legumes.index');
Route::get('/games', [GameController::class, 'index'])->name('games');
Route::get('/learn', function () {
    return view('learn');
})->name('learn');

// Quiz Routes
Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
Route::get('/quizzes/{quiz}/take', [QuizController::class, 'take'])->name('quizzes.take');
Route::post('/quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');
Route::get('/quizzes/{quiz}/results', [QuizController::class, 'results'])->name('quizzes.results');

// Test Quiz Games Page
Route::get('/test-quiz-games', function() {
    return view('test-quiz-games');
})->name('test.quiz.games');

Route::get('/scoreboard', [QuizController::class, 'scoreboard'])->name('scoreboard');

// Authentication routes
require __DIR__.'/auth.php';

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Categories
    Route::resource('categories', CategoryController::class);

    // Contents
    Route::resource('contents', ContentController::class);

    // Games
    Route::resource('games', AdminGameController::class);

    // Quizzes
    Route::resource('quizzes', AdminQuizController::class);
    Route::post('quizzes/{quiz}/questions', [AdminQuizController::class, 'addQuestion'])->name('quizzes.questions.store');
    Route::delete('questions/{question}', [AdminQuizController::class, 'deleteQuestion'])->name('questions.destroy');
    Route::get('quizzes/{quiz}/scores', [AdminQuizController::class, 'scores'])->name('quizzes.scores');

    // Users
    Route::resource('users', UserController::class);

    // Database Manager
    Route::get('/database', [DatabaseManagerController::class, 'index'])->name('database.index');
    Route::get('/database/{table}', [DatabaseManagerController::class, 'showTable'])->name('database.table');
    Route::get('/database/{table}/create', [DatabaseManagerController::class, 'createRecord'])->name('database.create');
    Route::post('/database/{table}', [DatabaseManagerController::class, 'storeRecord'])->name('database.store');
    Route::get('/database/{table}/{id}/edit', [DatabaseManagerController::class, 'editRecord'])->name('database.edit');
    Route::put('/database/{table}/{id}', [DatabaseManagerController::class, 'updateRecord'])->name('database.update');
    Route::delete('/database/{table}/{id}', [DatabaseManagerController::class, 'deleteRecord'])->name('database.delete');
});
