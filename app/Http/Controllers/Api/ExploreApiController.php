<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;
use Validator;
use __;

class ExploreApiController extends Controller
{

    public function explore_api(Request $request)
    {
        try
        {

            //Validated
            $validate_menu = Validator::make($request->all(),
                [
                    'latitude'      => 'required',
                    'longitude'     => 'required',
                    'category_type' => 'required',
                ]);

            if ($validate_menu->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'validation error',
                    'errors'  => $validate_menu->errors(),
                ], 401);
            }

            \DB::connection()->enableQueryLog();

            $wt                   = new Weather();
            $data['weather_info'] = $wt->getCurrentByCord($request->latitude, $request->longitude);

            $data['categories']    = Category::select('id', 'title', 'icon', 'status')->where("status", 1)->get();
            $data['explore_deals'] = '';

            if (__::get($request, 'category_type') == 'hotel') {

                $data['explore_deals'] = Hotel::selectRaw("( 3959 * acos( cos( radians(hotels.latitude) ) * cos( radians( 23.7104 ) ) * cos( radians( 90.4074 ) - radians(hotels.longitude) ) + sin( radians(hotels.latitude) ) * sin(radians(23.7104)) ) ) AS distance,hotels.*")
                    ->with([
                        "hotel_photos",
                        "hotel_tags",
                    ])->where('is_active', 1)->join('hotel_ratings', 'hotel_ratings.hotel_id', 'hotels.id')->orderBy('distance', 'ASC');

                if (__::get($request, 'start_date') && __::get($request, 'end_date')) {
                    $start_date            = $request->start_date;
                    $end_date              = $request->end_date;
                    $data['explore_deals'] = $data['explore_deals']->whereHas('hotel_rooms', function ($q) use ($start_date, $end_date) {

                        $q->whereBetween("start_date", [$start_date, $end_date]);
                        $q->whereBetween("end_date", [$start_date, $end_date]);
                    });
                }

                if (__::get($request, 'location')) {

                    $data['explore_deals'] = $data['explore_deals']->where('location', 'like', '%' . $request->location . '%');
                }

                $data['explore_deals'] = $data['explore_deals']->get();
/*    $queries = \DB::getQueryLog();
dd($queries);*/
            }

            if (__::get($request, 'category_type') == 'restaurant') {

                $data['explore_deals'] = Restaurant::selectRaw("( 3959 * acos( cos( radians(restaurants.latitude) ) * cos( radians( 23.7104 ) ) * cos( radians( 90.4074 ) - radians(restaurants.longitude) ) + sin( radians(restaurants.latitude) ) * sin(radians(23.7104)) ) ) AS distance,restaurants.*")->with([
                    "restaurant_photos",
                    "restaurant_tags"])->where('is_active', 1)->join('restaurant_ratings', 'restaurant_ratings.restaurant_id', 'restaurants.id')->orderBy('distance', 'ASC');

                if (__::get($request, 'location')) {

                    $data['explore_deals'] = $data['explore_deals']->where('location', 'like', '%' . $request->location . '%');
                }

                if (__::get($request, 'start_date') && __::get($request, 'end_date')) {
                    $start_date            = $request->start_date;
                    $end_date              = $request->end_date;
                    $data['explore_deals'] = $data['explore_deals']->whereHas('restaurant_menu_foods', function ($q) use ($start_date, $end_date) {

                        $q->whereBetween("start_date", [$start_date, $end_date]);
                        $q->whereBetween("end_date", [$start_date, $end_date]);
                    });
                }

                $data['explore_deals'] = $data['explore_deals']->get();
            }

            return response()->json([
                "status"  => true,
                'message' => 'Explore Details Listed',
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
