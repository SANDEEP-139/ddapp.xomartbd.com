<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantMenu;
use App\Models\RestaurantMenuFood;
use App\Models\RestaurantOrder;
use App\Models\RestaurantOfferBanner;
use App\Models\User;
use Validator;

class RestaurantApiController extends Controller
{
    public function restaurant_detail(Request $request){

       try {

           $validate_menu = Validator::make($request->all(), 
               [
                   'restaurant_id' => 'required',
               ]);

           if($validate_menu->fails()){
               return response()->json([
                   'status' => false,
                   'message' => 'validation error',
                   'errors' => $validate_menu->errors()
               ], 401);
           }
           $restaurant_info = [];
           $restaurant_info = Restaurant::where(["is_active" => 1, "id" => $request->restaurant_id])
               ->with([
                   "restaurant_photos",
                   "restaurant_tags",
                   "restaurant_ratings",
                   "restaurant_ratings.user",
                   "restaurant_menus",
                   "restaurant_menus.restaurant_menu_photos",
                   "restaurant_menus.restaurant_menu_tags"
               ])
               ->get();

           return response()->json(
               [
                   "status" => true,
                   "message" => "Restaurant Listed Successfully",
                   "data" => $restaurant_info,
               ],
               200
           );
       } catch (\Throwable $error) {
           return response()->json(
               [
                   "status" => false,
                   "message" => $error->getMessage(),
               ],
               500
           );
       }

}
    public function food(Request $request){
         //Validated
     $validate_menu = Validator::make($request->all(), 
         [
             'restaurant_menu_id' => 'required',
         ]);

     if($validate_menu->fails()){
         return response()->json([
             'status' => false,
             'message' => 'validation error',
             'errors' => $validate_menu->errors()
         ], 401);
     }
     try {
         $menu_info = [];

         $menu_info = RestaurantMenu::where("id", $request->restaurant_menu_id)
             ->with([
                 "restaurant_menu_food_photos",
                 "restaurant_menu_food_tags"
             ])
             ->get();

         return response()->json(
             [
                 "status" => true,
                 "message" => "Restaurant Menu Food Listed Successfully",
                 "data" => $menu_info,
             ],
             200
         );
     } catch (\Throwable $error) {
         return response()->json(
             [
                 "status" => false,
                 "message" => $error->getMessage(),
             ],
             500
         );
     }


    }

    public function offer(){

        try {
            $restaurant_offer_banner_info = [];
            $restaurant_offer_banner_info = RestaurantOfferBanner::where("is_active", 1)
                ->with([
                    "restaurant_offer_banner_photos",
                ])
                ->get();

            return response()->json(
                [
                    "status" => true,
                    "message" => "Restaurant Offer Banner Listed Successfully",
                    "data" => $restaurant_offer_banner_info,
                ],
                200
            );
        } catch (\Throwable $error) {
            return response()->json(
                [
                    "status" => false,
                    "message" => $error->getMessage(),
                ],
                500
            );
        }
    }
}
