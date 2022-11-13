<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomPhoto extends Model
{
    use HasFactory;

    protected $appends = ['original_name'];

    public function getNameAttribute(){
        
        return asset('hotel_room_photos/'.$this->attributes['name']);    
    }

    public function getOriginalNameAttribute(){
        
        
        return $this->attributes['name'];    
    }
}
