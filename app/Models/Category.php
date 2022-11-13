<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function getIconAttribute(){
        
        
        return asset('category_photos/'.$this->attributes['icon']);    
    }
}
