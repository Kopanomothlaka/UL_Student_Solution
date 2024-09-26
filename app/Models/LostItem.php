<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_description',
        'location',
        'contact_number',
        'item_type',
        'image',
        'user_id'
    ];

    // LostItem.php model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
