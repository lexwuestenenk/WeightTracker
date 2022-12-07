<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exercises extends Model
{
    use HasFactory;

    public function exercises()
    {
        return $this->morphedByMany(workouts::class, 'can_have_exercise');
    }
}

