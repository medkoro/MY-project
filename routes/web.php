<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Client-side routes
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/category/{category}', [PageController::class, 'showCategory'])->name('category.show');

// User Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('user.dashboard');
});

// Admin-side routes (grouped for clarity)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Categories
    Route::get('/categories/create', [AdminController::class, 'createCategory'])->name('categories.create');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');

    // Content
    Route::get('/content', [AdminController::class, 'index'])->name('content.index');
    Route::get('/content/create', [AdminController::class, 'createContent'])->name('content.create');
    Route::post('/content', [AdminController::class, 'storeContent'])->name('content.store');
    Route::get('/content/{content}/edit', [AdminController::class, 'editContent'])->name('content.edit');
    Route::put('/content/{content}', [AdminController::class, 'updateContent'])->name('content.update');
    Route::delete('/content/{content}', [AdminController::class, 'destroyContent'])->name('content.destroy');
});

?>
