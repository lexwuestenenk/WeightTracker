<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserWeightController;
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
    Route::get('/user-info', [App\Http\Controllers\UserWeightController::class, 'index'])->name('user-info.index');
    Route::patch('/user-info', [App\Http\Controllers\UserWeightController::class, 'update'])->name('user-info.update');
});

require __DIR__.'/auth.php';
