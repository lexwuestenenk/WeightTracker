<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
});

// User account information
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User health information
Route::middleware('auth')->group(function () {
    Route::get('/user-info', [App\Http\Controllers\UserHealthController::class, 'index'])->name('user-info.index');
    Route::patch('/user-info', [App\Http\Controllers\UserHealthController::class, 'update'])->name('user-info.update');
});

// Exercises (Overview & Singular)
Route::middleware('auth')->group(function () {
    Route::get('/exercise', [App\Http\Controllers\ExerciseController::class, 'index'])->name('exercise.index');
    Route::get('/exercise/{id}', [App\Http\Controllers\ExerciseController::class, 'show'])->name('exercise.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/workout', [App\Http\Controllers\WorkoutController::class, 'index'])->name('workout.index');
    Route::get('/workout/{id}', [App\Http\Controllers\WorkoutController::class, 'show'])->name('workout.show');
});


require __DIR__.'/auth.php';
