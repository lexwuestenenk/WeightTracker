<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\workouts;

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
        
        return view('workout_exercise_overview', [
            'workout' => $workout,
            'exercise' => $workout->exercises
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
        $workout = workouts::find($request->id);
        $workout->delete();

        return redirect()->route('workout.index');
    }
}
