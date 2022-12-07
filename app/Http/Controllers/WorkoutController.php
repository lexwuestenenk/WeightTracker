<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\workouts;
use App\Models\exercises;
use App\Models\WorkoutExercise;

class WorkoutController extends Controller
{
    public function index(Request $request)
    {
        return view('workout_overview', [
            'workout' => workouts::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function show($workout_id)
    {
        // Show workout with id that has been given in the web.php routes
        $workout = workouts::find($workout_id);
        dd($workout->exercises);
    }
}
