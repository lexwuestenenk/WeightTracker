<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\exercises;
use App\Models\workouts;

class ExerciseController extends Controller
{
    public function index(Request $request)
    {
        return view('exercise_overview', [
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

}
