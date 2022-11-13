<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantOrder extends Model
{
    use HasFactory;

    public function restaurant(){
     return $this->belongsTo(Restaurant::class);   
    }

    public function restaurant_menu(){
      return $this->belongsTo(RestaurantMenu::class);   
    }
    public function restaurant_menu_food(){
      return $this->belongsTo(RestaurantMenuFood::class);   
    }
    public function user(){
      return $this->belongsTo(User::class);   
    }
}
