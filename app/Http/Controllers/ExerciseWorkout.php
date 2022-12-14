<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\exercise_workouts;
use App\Models\workouts;

class ExerciseWorkout extends Controller
{
    public function create(Request $request)
    {
        if(exercise_workouts::where('user_id', Auth::user()->id)->where('exercise_id', $request->exercise_id)->where('workout_id', $request->workout_id)->get()->isNotEmpty())
        {
            return redirect()->back()->with('status', 'Exercise is already in your workout!');
        }

        exercise_workouts::create([
            'workout_id' => $request->workout_id,
            'exercise_id' => $request->exercise_id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('status', 'Exercise has been added to your workout!');
    }

    public function destroy(Request $request)
    {
        // Check if workout is from the specific user, if it is, let them delete the exercise from it
        // Otherwise, deny the request.
        if(exercise_workouts::where('workout_id', $request->workout_id)->where('user_id', Auth::user()->id)->where('exercise_id', $request->exercise_id)->get()->isNotEmpty())
        {
            exercise_workouts::where('workout_Stid', $request->workout_id)->where('user_id', Auth::user()->id)->where('exercise_id', $request->exercise_id)->delete();
            return redirect()->back()->with('status', 'Exercise has been deleted from your workout!');
        }

        return redirect()->back()->with('status', 'Nice try ;)');
    }

    
}
