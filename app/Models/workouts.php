<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workouts extends Model
{
    use HasFactory;

    public function exercises()
    {
        return $this->morphToMany(exercises::class, 'can_have_exercise');
    }
}
