<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\User;

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
            'users' => User::all(),
            'users_paginated' => User::paginate(25),
            'users_per_month' => $users_per_month,
        ]);
    }

    public function show(Request $request)
    {

    }

    public function destroy(Request $request)
    {
        
    }
}
