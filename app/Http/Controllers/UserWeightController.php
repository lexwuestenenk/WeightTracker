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
        return view('user', [
            'user' => $request->user(),
            'weight' => user_weight::find(Auth::user()->id),
        ]);
    }

    public function update(Request $request)
    {
        user_weight::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['weight' => $request->weight]
        );
        
        return redirect('user')->with('status', 'Weight has been updated'); 
    }
}
