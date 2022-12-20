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
        if($request->query('query')) {
            $workout = workouts::where('user_id', auth::user()->id)
                ->where('name', 'LIKE', '%' . $request->query('query') . '%')
                ->orWhere('description', 'LIKE', '%' . $request->query('query') . '%');

            return view('workout_overview', [
                'workout' => $workout->paginate(15)
            ]);
        } else {
            return view('workout_overview', [
                'workout' => workouts::where('user_id', Auth::user()->id)->paginate(15)
            ]);
        }
    }

    // Show exercises in workout (details)
    public function show($workout_id)
    {
        if (workouts::where('user_id', Auth::user()->id)->where('id', $workout_id)->get()->isNotEmpty())
        {
            $workout = workouts::find($workout_id);
            $exercises = exercises::all();
            
            return view('workout_exercise_overview', [
                'workout' => $workout,
                'workout_exercise' => $workout->exercises,
                'exercise' => $exercises
            ]);
        }
        
        return redirect()->route('dashboard.index')->with('status', "Nice try ;)")->with('action', 'Failed');;
    }

    // Create new workout
    public function create(Request $request)
    {
        workouts::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('workout.index')->with('status', 'Workout has been created!')->with('action', 'Succes');;
    }

    // Update existing workout
    public function update(Request $request)
    {
        if(workouts::where('user_id', Auth::user()->id)->where('id', $request->id)->get()->isNotEmpty())
        {
            $workout = workouts::find($request->id);
            $workout->name = $request->name;
            $workout->description = $request->description;
            $workout->save();
    
            return redirect()->route('workout.index')->with('status', 'Workout has been updated!')->with('action', 'Succes');;        
        }
        return redirect()->back()->with('status', 'Nice try ;)');
    }

    // Delete existing workout
    public function destroy(Request $request)
    {
        if(workouts::where('user_id', Auth::user()->id)->where('id', $request->id)->get()->isNotEmpty())
        {
            workouts::where('user_id', Auth::user()->id)->where('id', $request->id)->first()->delete();
            return redirect()->back()->with('status', 'Workout has been deleted!')->with('action', 'Succes');;
        }

        return redirect()->back()->with('status', 'Nice try ;)')->with('action', 'Failed');;
    }
}
