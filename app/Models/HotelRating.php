<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRating extends Model
{
    use HasFactory;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function hotel_room()
    {
        return $this->belongsTo(HotelRoom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
