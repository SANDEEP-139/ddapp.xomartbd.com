<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use __;
use Validator;

class HomeApiController extends Controller
{

    public function home_api(Request $request)
    {
        try
        {

        	
        	$data['user_info'] = User::where("id", $request->user()->id)->first();
        	
            $data['categories'] = Category::select('id', 'title', 'icon', 'status')->where("status", 1)->get();
            $data['campaigns']  = Campaign::select('id', 'title', 'campaign_type', 'banner_photo', 'status', 'campaign_date','campaign_description')->where('campaign_type','Ongoing')->where('status', 1)->orderBy('id', 'Desc')->get();

            $data['popular_deals'] = '';

            if (__::get($request, 'category') == 'hotel') {

                $data['popular_deals'] = Hotel::with([
                    "hotel_photos",

                    "hotel_tags"])->where('is_active', 1)->join('hotel_ratings', 'hotel_ratings.hotel_id', 'hotels.id')->orderBy('hotel_ratings.rating', 'DESC');

                if (__::get($request, 'location')) {

                    $data['popular_deals'] = $data['popular_deals']->where('location', 'like', '%' . $request->location . '%');
                }

                $data['popular_deals'] = $data['popular_deals']->get();
            }

            if (__::get($request, 'category') == 'restaurant') {

                $data['popular_deals'] = Restaurant::with([
                    "restaurant_photos",
                    "restaurant_tags"])->where('is_active', 1)->join('restaurant_ratings', 'restaurant_ratings.restaurant_id', 'restaurants.id')->orderBy('restaurant_ratings.rating', 'DESC');

                if (__::get($request, 'location')) {

                    $data['popular_deals'] = $data['popular_deals']->where('location', 'like', '%' . $request->location . '%');
                }

                $data['popular_deals'] = $data['popular_deals']->get();
            }

            return response()->json([
                "status"  => true,
                'message' => 'Home Details Listed',
                "data"    => (object) $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function ongoing_upcoming_campaigns_api(Request $request)
    {
        try
        {
            //Validated
            $data['user_info'] = User::where("id", $request->user()->id)->first();
            $data['ongoing_campaigns'] = Campaign::where('status', 1)->where('campaign_type','Ongoing')->orderBy('id', 'Desc')->get();
            $data['upgoing_campaigns'] = Campaign::where('status', 1)->where('campaign_type','Upcoming')->orderBy('id', 'Desc')->get();
            return response()->json([
                "status"  => true,
                'message' => 'Campaign Details Listed',
                "data"    => (object) $data,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
