<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal_information extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'weight_id', 'age', 'length'];
}
