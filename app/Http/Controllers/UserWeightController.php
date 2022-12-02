<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\user_weight;
use App\Models\personal_information;


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
            'weight_latest' => user_weight::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first(),
            'personal_information' => personal_information::find(Auth::user()->id)
        ]);
    }

    public function update(Request $request)
    {
        user_weight::create([
            'user_id' => Auth::user()->id,
            'weights' => $request->weights
        ]);

        personal_information::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
            ],
            [
            'user_id' => Auth::user()->id,
            'weight_id' => user_weight::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first()->id,
            'age' => $request->age,
            'length' => $request->length,
            ]
        );

        return redirect('/user-info')->with('status', 'Weight has been updated!'); 
    }
}
