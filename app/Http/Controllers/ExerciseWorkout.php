<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\exercise_workouts;

class ExerciseWorkout extends Controller
{
    public function create(Request $request)
    {
        exercise_workouts::create([
            'workout_id' => $request->workout_id,
            'exercise_id' => $request->exercise_id,
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        exercise_workouts::destroy($request->id);
        return redirect()->back()->with('status', 'Workout has been deleted!');
    }

    
}
