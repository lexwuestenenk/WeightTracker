<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\user_workout;

class WorkoutController extends Controller
{
    public function index(Request $request)
    {
        return view('workout-overview', [
            'workouts' => user_workout::where('user_id', Auth::user()->id),
        ]);
    }
}
