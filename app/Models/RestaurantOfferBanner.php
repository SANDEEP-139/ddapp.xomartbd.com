<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantOfferBanner extends Model
{
    use HasFactory;

    public function restaurant_offer_banner_photos()
    {
        return $this->hasMany(RestaurantOfferBannerPhoto::class);
    }
}
