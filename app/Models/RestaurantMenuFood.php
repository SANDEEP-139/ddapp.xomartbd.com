<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantMenuFood extends Model
{
    protected $table = 'restaurant_menu_foods';

    use HasFactory;

    public function restaurant_menu_food_photos()
    {
        return $this->hasMany(RestaurantMenuFoodPhoto::class);
    }

    public function restaurant_menu_food_tags()
    {
        return $this->hasMany(RestaurantMenuFoodTag::class);
    }

    public function restaurant_menu_order(){
         return $this->hasMany(RestaurantOrder::class);
    } 

    public function restaurant(){
     return $this->belongsTo(Restaurant::class);   
    }

    public function restaurant_menu(){
      return $this->belongsTo(RestaurantMenu::class);   
    }

    

}
