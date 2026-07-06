<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
   // In columns me hum form se direct data insert karwa sakte hain
    protected $fillable = [
        'name',
        'brand',
        'model_year',
        'price_per_day',
        'image',
        'category',
        'is_available',
    ];
}
