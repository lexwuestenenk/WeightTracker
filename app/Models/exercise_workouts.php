<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exercise_workouts extends Model
{
    use HasFactory;

    protected $fillable = ['workout_id', 'exercise_id', 'user_id', 'updated_at', 'created_at'];
}

