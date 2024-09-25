<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'lab_name',
        'lab_location',
        'booking_date',
        'booking_time',
        'user_id', // Assuming you want to link bookings to users
    ];

    // Optionally, you can define a relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
