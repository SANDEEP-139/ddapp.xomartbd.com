<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Campaign extends Model
{
    use HasFactory;

    public function setCampaignStartDateAttribute($value){
           
        
        $this->attributes['campaign_start_date'] = Carbon::parse( $value )->format( 'Y-m-d');
            
    }
    public function getCampaignStartDateAttribute(){
            
        return Carbon::parse( $this->attributes['campaign_start_date'] )->format( 'm/d/Y' );
            
    }

    public function setCampaignEndDateAttribute($value){
           
        
        $this->attributes['campaign_end_date'] = Carbon::parse( $value )->format( 'Y-m-d');
            
    }
    public function getCampaignEndDateAttribute(){
            
        return Carbon::parse( $this->attributes['campaign_end_date'] )->format( 'm/d/Y' );
            
    }

    public function getBannerPhotoAttribute(){
        
        return asset('campaign_photos/'.$this->attributes['banner_photo']);    
    }
}
