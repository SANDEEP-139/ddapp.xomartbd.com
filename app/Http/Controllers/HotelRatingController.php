<?php

namespace App\Http\Controllers;

use App\Models\HotelRating;
use Illuminate\Http\Request;

class HotelRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel_ratings = HotelRating::with(['hotel_room','user','hotel'])->get();
        return view('hotel_ratings.index',compact('hotel_ratings'));
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
     * @param  \App\Models\HotelRating  $hotelRating
     * @return \Illuminate\Http\Response
     */
    public function show(HotelRating $hotelRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelRating  $hotelRating
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelRating $hotelRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelRating  $hotelRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelRating $hotelRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelRating  $hotelRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelRating $hotelRating)
    {
        //
    }
    public function change_hotelrating_status(Request $request)
    {
        $status = HotelRating::where('id',$request->id)->update([
            'status' => $request->status,
        ]);
        return $status;
    }
}
