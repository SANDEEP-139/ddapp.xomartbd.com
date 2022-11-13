<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function restaurant_photos()
    {
        return $this->hasMany(RestaurantPhoto::class);
    }

    public function restaurant_tags()
    {
        return $this->hasMany(RestaurantTag::class);
    }

    public function restaurant_menu_foods(){
     return $this->hasMany(RestaurantMenuFood::class);      
    }

    public function restaurant_ratings(){
        return $this->hasMany(RestaurantRating::class);
    }

    public function restaurant_menus()
    {
        return $this->hasMany(RestaurantMenu::class);
    }
}
