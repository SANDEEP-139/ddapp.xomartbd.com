<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantMenu extends Model
{
    use HasFactory;

    public function restaurant_menu_photos()
    {
        return $this->hasMany(RestaurantMenuPhoto::class);
    }

    public function restaurant_menu_tags()
    {
        return $this->hasMany(RestaurantMenuTag::class);
    }

    public function restaurant(){
     return $this->belongsTo(Restaurant::class);   
    }


}
