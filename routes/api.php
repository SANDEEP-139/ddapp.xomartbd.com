<?php

use App\Http\Controllers\Api\RestaurantApiController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\HotelApiController;
use \App\Http\Controllers\Api\UserApiController;
use \App\Http\Controllers\Api\CategoryApiController;
use \App\Http\Controllers\OfferBannerController;
use \App\Http\Controllers\Api\HomeApiController;
use \App\Http\Controllers\Api\ExploreApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->controller(UserApiController::class)->group(function () {

	Route::get('profile', 'profile');
	Route::post('logout', 'logout');

});

Route::middleware('auth:sanctum')->controller(HomeApiController::class)->group(function () {

    Route::post('ongoing_upcoming_campaigns_api', "ongoing_upcoming_campaigns_api");
    Route::post("home_api", "home_api");

});

//Hotels
Route::middleware('auth:sanctum')->controller(HotelApiController::class)->group(function () {
	Route::post("hotel_detail", "hotel_detail");
	Route::post("hotel_room_detail", "hotel_room_detail");
	Route::post("grab_offer_api", "grab_offer_api");
	Route::post("claim_discount_api", "claim_discount_api");

//Location
	Route::post("hotel_search_by_name", "hotel_search_by_name");
	Route::get("locations", "locations");
	Route::post("hotel_search_by_location", "hotel_search_by_location");

});

//Restaurant
Route::middleware('auth:sanctum')->controller(RestaurantApiController::class)->group(function () {
	Route::post("restaurant_detail", "restaurant_detail");
	Route::post("restaurants/menus", "menus");
	Route::post("restaurants/menus/food", "food");
	Route::get("restaurants/offer", "offer");
});

/*Users API */
Route::controller(UserApiController::class)->group(function () {
	Route::post('register', 'register');
	Route::post('login', 'login');
	Route::post('forgot_password', 'forgot_password');
});

//Category
Route::post('explore_api', [ExploreApiController::class, "explore_api"]);



//Offer Banner
Route::get("/offer_banner", [OfferBannerController::class, "AllOffers"]);
