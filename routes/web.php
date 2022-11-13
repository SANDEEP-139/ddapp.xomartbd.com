<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return redirect(route('login'));
});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::resource('customer', 'App\Http\Controllers\CustomerController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    Route::resource('hotels', 'App\Http\Controllers\HotelController', ['except' => ['show']]);
    Route::resource('hotel-booking-list', 'App\Http\Controllers\HotelBookController', ['except' => ['show']]);
    Route::post('hotels/store_photos', 'App\Http\Controllers\HotelController@store_photos')->name('hotels.store_photos');
    Route::post('hotels/remove_hotel_photos', 'App\Http\Controllers\HotelController@remove_hotel_photos')->name('hotels.remove_hotel_photos');
    Route::post('hotels/fetch_photos', 'App\Http\Controllers\HotelController@fetch_photos')->name('hotels.fetch_photos');
    Route::resource('hotel_room_offers', 'App\Http\Controllers\HotelRoomsController', ['except' => ['show']]);
    Route::post('hotel_room_offers/store_photos', 'App\Http\Controllers\HotelRoomsController@store_photos')->name('hotel_room_offers.store_photos');
    Route::post('hotel_room_offers/remove_hotel_rooms_photos', 'App\Http\Controllers\HotelRoomsController@remove_hotel_rooms_photos')->name('hotel_room_offers.remove_hotel_rooms_photos');
    Route::resource('hotel-rating', 'App\Http\Controllers\HotelRatingController', ['except' => ['show']]);

    Route::resource('restaurants', 'App\Http\Controllers\RestaurantController', ['except' => ['show']]);
    Route::post('restaurants/store_photos', 'App\Http\Controllers\RestaurantController@store_photos')->name('restaurants.store_photos');
    Route::post('restaurants/remove_restaurant_photos', 'App\Http\Controllers\RestaurantController@remove_restaurant_photos')->name('restaurants.remove_restaurant_photos');
    Route::resource('restaurant_menus', 'App\Http\Controllers\RestaurantMenuController', ['except' => ['show']]);
    Route::post('restaurant_menus/store_photos', 'App\Http\Controllers\RestaurantMenuController@store_photos')->name('restaurant_menus.store_photos');
    Route::resource('restaurant_menu_foods', 'App\Http\Controllers\RestaurantMenuFoodController', ['except' => ['show']]);
    Route::post('restaurant_menu_foods/store_photos', 'App\Http\Controllers\RestaurantMenuFoodController@store_photos')->name('restaurant_menu_foods.store_photos');
    Route::post('fetch_restaurant_menu', 'App\Http\Controllers\RestaurantMenuFoodController@fetch_restaurant_menu', ['except' => ['show']]);
    Route::resource('restaurant-order-list', 'App\Http\Controllers\RestaurantOrderController', ['except' => ['show']]);
    Route::resource('restaurant-rating', 'App\Http\Controllers\RestaurantRatingController', ['except' => ['show']]);
    Route::resource('roles', 'App\Http\Controllers\RoleController');

    Route::post('change_hotelrating_status', 'App\Http\Controllers\HotelRatingController@change_hotelrating_status');
    Route::post('change_restaurantrating_status', 'App\Http\Controllers\RestaurantRatingController@change_restaurantrating_status');
    Route::resource('categories', 'App\Http\Controllers\CategoryController');
    Route::resource('campaigns', 'App\Http\Controllers\CampaignController');
    Route::resource('pages', 'App\Http\Controllers\PageController');

});

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::get('migrate', function () {
    \Artisan::call('migrate');
    dd('migrated!');
});
