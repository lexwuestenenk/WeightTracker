<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user_weight;
use App\Models\personal_information;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $weight_array = [];
        $weight = user_weight::where('user_id', Auth::user()->id)->get()->splice(1);
        foreach ($weight as $w) {
            array_push($weight_array, ['date' => $w->created_at, 'weight' => $w->weights, 'bmi' => $w->bmi]);
        }
        
        return view('dashboard', [
            'user' => $request->user(),
            'weight' => json_encode($weight_array),
            'weight_latest' => user_weight::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first(),
            'personal_information' => personal_information::find(Auth::user()->id)
        ]);
    }
}
