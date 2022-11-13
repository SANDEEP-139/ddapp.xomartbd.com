<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPhoto extends Model
{
    use HasFactory;

    protected $appends = ['original_name'];


    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function getNameAttribute(){
        
        
        return asset('hotel_photos/'.$this->attributes['name']);    
    }

    public function getOriginalNameAttribute(){
        
        
        return $this->attributes['name'];    
    }
}
