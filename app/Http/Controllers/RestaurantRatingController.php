<?php

namespace App\Http\Controllers;

use App\Models\RestaurantRating;
use Illuminate\Http\Request;

class RestaurantRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_ratings  = RestaurantRating::with([
            "restaurant",
            "user",
        ])->get();
        
        return view('restaurant_ratings.index', compact('restaurant_ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestaurantRating  $restaurantRating
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantRating $restaurantRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantRating  $restaurantRating
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantRating $restaurantRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantRating  $restaurantRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantRating $restaurantRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestaurantRating  $restaurantRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantRating $restaurantRating)
    {
        //
    }
    public function change_restaurantrating_status(Request $request)
    {
        $status = RestaurantRating::where('id',$request->id)->update([
            'status' => $request->status,
        ]);
        return $status;
    }
}
