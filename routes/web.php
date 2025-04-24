<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\LearningController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Front Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/colors', [ColorController::class, 'index'])->name('colors.index');
Route::get('/numbers', [NumberController::class, 'index'])->name('numbers.index');
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
Route::get('/games', [GameController::class, 'index'])->name('games');
Route::get('/learn', function () {
    return view('learn');
})->name('learn');

// Authentication routes
require __DIR__.'/auth.php';

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Categories
    Route::resource('categories', CategoryController::class);

    // Contents
    Route::resource('contents', ContentController::class);

    // Games
    Route::resource('games', AdminGameController::class);

    // Users
    Route::resource('users', UserController::class);
});
