<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\LearningController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\AnimalController;



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
});
Route::get('/numbers', [NumberController::class, 'index'])->name('numbers.index');
Route::get('/colors', [ColorController::class, 'index'])->name('colors.index');
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('contents', ContentController::class);
});

// Authentication
Auth::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
