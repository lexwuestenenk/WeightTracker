<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\user_weight;
use App\Models\personal_information;


class UserHealthController extends Controller
{
    public function index(Request $request)
    {
        return view('user', [
            'user' => $request->user(),
            'weight' => user_weight::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15)->onEachSide(1),
            'weight_latest' => user_weight::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first(),
            'personal_information' => personal_information::find(Auth::user()->id)
        ]);
    }

    public function update(Request $request)
    {
        user_weight::create([
            'user_id' => Auth::user()->id,
            'weights' => $request->weights,
            'bmi' => round((($request->weights / $request->length / $request->length) * 10000), 2)
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

        return redirect('/user-info')->with('status', 'Health information has been updated!'); 
    }
}
