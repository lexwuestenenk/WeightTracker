<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\workouts;
use Illuminate\Http\Request;

class AdminWorkoutController extends Controller
{
    public function index(Request $request)
    {     
        $workouts_per_month = workouts::select('*')
            ->whereBetween('created_at',
                [Carbon::now()->subMonth(12), Carbon::now()]
            )
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months

        });       

        return view('admin-workout', [
            'workout_count' => workouts::all(),
            'workout' => workouts::paginate(15),
            'workouts_per_month' => $workouts_per_month,
        ]);
    }
}
