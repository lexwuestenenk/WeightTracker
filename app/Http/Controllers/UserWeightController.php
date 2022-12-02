<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\user_weight;


class UserWeightController extends Controller
{
    public function index(Request $request)
    {
        $weight_array = [];
        $weight = user_weight::where('user_id', Auth::user()->id)->get();
        foreach ($weight as $w) {
            array_push($weight_array, ['label' => $w->created_at, 'y' => $w->weights]);
        }

        return view('user', [
            'user' => $request->user(),
            'weight' => $weight_array,
            'weight_latest' => user_weight::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first()
        ]);
    }

    public function update(Request $request)
    {
        user_weight::create([
            'user_id' => Auth::user()->id,
            'weights' => $request->weights
        ]);

        return redirect('/user-info')->with('status', 'Weight has been updated!'); 
    }
}
