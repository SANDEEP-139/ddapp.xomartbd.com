<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantPhoto extends Model
{
    use HasFactory;

    protected $appends = ['original_name'];

    public function getNameAttribute(){
        
        return asset('restaurant_photos/'.$this->attributes['name']);    
    }

    public function getOriginalNameAttribute(){
        
        
        return $this->attributes['name'];    
    }
}
