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

// Workout (Overview, Create, Update, Delete, Singular)
Route::middleware('auth')->group(function () {
    Route::get('/workout', [App\Http\Controllers\WorkoutController::class, 'index'])->name('workout.index');
    Route::get('/workout/{id}', [App\Http\Controllers\WorkoutController::class, 'show'])->name('workout.show');
    Route::post('/workout', [App\Http\Controllers\WorkoutController::class, 'create'])->name('workout.create');
    Route::patch('/workout', [App\Http\Controllers\WorkoutController::class, 'update'])->name('workout.update');
    Route::delete('/workout', [App\Http\Controllers\WorkoutController::class, 'destroy'])->name('workout.destroy');
});

// Add exercises to exercise_workouts (pivot table) to save to scheme
Route::middleware('auth')->group(function () {
    Route::post('exercise_workouts', [App\Http\Controllers\ExerciseWorkout::class, 'create'])->name('exercise_workouts.create');
});

// Admin users page
Route::middleware('admin')->group(function () {
    Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/admin/users', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
});

// Admin exercises page
Route::middleware('admin')->group(function () {
    Route::get('/admin/exercises', [App\Http\Controllers\AdminExerciseController::class, 'index'])->name('admin-exercises.index');
    Route::get('/exercise/{id}', [App\Http\Controllers\AdminExerciseController::class, 'show'])->name('admin-exercises.show');
    Route::post('/admin/exercises', [App\Http\Controllers\AdminExerciseController::class, 'create'])->name('admin-exercises.create');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin/workouts', [App\Http\Controllers\AdminWorkoutController::class, 'index'])->name('admin-workouts.index');
});

require __DIR__.'/auth.php';
