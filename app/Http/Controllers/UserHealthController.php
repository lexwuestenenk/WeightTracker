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
        $bmi = round((($request->weights / $request->length / $request->length) * 10000), 2);

        if ($bmi >= 100) {
            return redirect()->back()->with('status', 'Please enter realistic details')->with('action', 'Failed');;
        }

        user_weight::create([
            'user_id' => Auth::user()->id,
            'weights' => $request->weights,
            'bmi' => $bmi
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

        return redirect()->back()->with('status', 'Health information has been updated!')->with('action', 'Succes');; 
    }
}
