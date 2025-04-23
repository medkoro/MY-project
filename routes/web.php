<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProfileController;

// Redirect root to login if not authenticated
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard redirects to quizzes
    Route::get('/dashboard', function () {
        return redirect()->route('quizzes.index');
    })->name('dashboard');

    // Quiz routes
    Route::prefix('quizzes')->name('quizzes.')->group(function () {
        Route::get('/', [QuizController::class, 'index'])->name('index');
        Route::get('/{quiz}', [QuizController::class, 'show'])->name('show');
        Route::post('/{quiz}/submit', [QuizController::class, 'submit'])->name('submit');
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});

require __DIR__.'/auth.php';
