<?php

namespace App\Http\Controllers;

use App\Models\workouts;
use App\Models\exercises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminExerciseController extends Controller
{
    public function index(Request $request)
    {
        return view('admin-exercise', [
            'exercise_count' => exercises::all(),
            'exercise' => exercises::paginate(15),
        ]);
    }

    public function show($id)
    {
        return view('exercise_detail', [
            'exercise' => exercises::find($id),
            'workout' => workouts::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function create(Request $request)
    {
        $filename = "";
        
        if($request->file('image'))
        {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
        }

        exercises::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect()->route('admin-exercises.index')->with('status', 'Exercise has been created!');
    }
}
