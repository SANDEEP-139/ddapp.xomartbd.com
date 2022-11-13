<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    use HasFactory;

    public function hotel_room_photos()
    {
        return $this->hasMany(HotelRoomPhoto::class);
    }

    public function hotel_booked(){
         return $this->hasMany(HotelBook::class);
    } 

    public function hotel(){
     return $this->belongsTo(Hotel::class);   
    }
}
