<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    
    public function hotel_photos()
    {
        return $this->hasMany(HotelPhoto::class);
    }

    public function hotel_services()
    {
        return $this->hasMany(HotelService::class);
    }

    public function hotel_tags(){
        return $this->hasMany(HotelTag::class);
    }

    public function hotel_ratings(){
        return $this->hasMany(HotelRating::class);
    }

    public function hotel_rooms(){
         return $this->hasMany(HotelRoom::class);
    }

    public function hotel_booked(){
         return $this->hasMany(HotelBook::class);
    }    
}
