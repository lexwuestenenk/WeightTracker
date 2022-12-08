<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workouts extends Model
{
    use HasFactory;

    public function exercises()
    {
        return $this->belongsToMany(exercises::class, 'exercise_workout', 'workout_id', 'exercise_id');
    }
}
