<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workouts extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function exercises()
    {
        return $this->belongsToMany(exercises::class, 'exercise_workouts', 'workout_id', 'exercise_id');
    }
}
