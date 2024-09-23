<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'serial_number', 'type', 'image', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
