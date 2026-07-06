<?php

namespace App\Models;

use App\Models\User;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'car_id',
    'start_date',
    'end_date',
    'total_price',
    'status',
    'is_blocked'
    ];

    // Ek booking kisi AIK specific gaari ki hoti hai (Belongs To Relationship)
public function car()
{
    return $this->belongsTo(Car::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
// Bookings relationship
public function bookings()
{
    return $this->hasMany(\App\Models\Booking::class);
}
}
