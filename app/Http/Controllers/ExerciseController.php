<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\exercises;

class ExerciseController extends Controller
{
    public function index(Request $request)
    {
        return view('exercise_overview', [
            'exercise' => exercises::all(),
        ]);
    }

    public function show($id)
    {
        return view('exercise_detail', [
            'exercise' => exercises::find($id)
        ]);
    }
}
