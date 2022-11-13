<?php

namespace App\Http\Controllers;

use App\Models\HotelBook;
use Illuminate\Http\Request;
use App\Models\HotelRoom;
use App\Models\User;

class HotelBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
        $hotel_booked = HotelBook::with(['hotel_room','user','hotel'])->get();
        return view('hotel_booked.index', compact('hotel_booked'));

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
     * @param  \App\Models\HotelBook  $hotelBook
     * @return \Illuminate\Http\Response
     */
    public function show(HotelBook $hotelBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelBook  $hotelBook
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelBook $hotelBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelBook  $hotelBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelBook $hotelBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelBook  $hotelBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelBook $hotelBook)
    {
        //
    }
}
