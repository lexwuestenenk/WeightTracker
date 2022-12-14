<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\user_weight;
use App\Models\personal_information;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users_per_month = User::select('*')
            ->whereBetween('created_at',
                [Carbon::now()->subMonth(12), Carbon::now()]
            )
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months

        });        

        return view('/admin-users', [
            'user_count' => User::all(),
            'user' => User::paginate(25),
            'users_per_month' => $users_per_month,
        ]);
    }
}
