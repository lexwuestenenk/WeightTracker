<?php

namespace App\Http\Controllers;

use App\Models\exercises;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\workouts;

class WorkoutController extends Controller
{
    // Workout overview
    public function index(Request $request)
    {
        return view('workout_overview', [
            'workout' => workouts::where('user_id', Auth::user()->id)->get()
        ]);
    }

    // Show exercises in workout (details)
    public function show($workout_id)
    {
        $workout = workouts::find($workout_id);
        $exercises = exercises::all();
        
        return view('workout_exercise_overview', [
            'workout' => $workout,
            'workout_exercise' => $workout->exercises,
            'exercise' => $exercises
        ]);
    }

    public function create(Request $request)
    {
        workouts::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('workout.index');
    }

    public function update(Request $request)
    {
        $workout = workouts::find($request->id);
        $workout->name = $request->name;
        $workout->description = $request->description;
        $workout->save();

        return redirect()->route('workout.index');
    }

    public function destroy(Request $request)
    {
        workouts::destroy($request->id);
        return redirect()->route('workout.index');
    }
}
