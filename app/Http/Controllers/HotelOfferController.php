<?php

namespace App\Http\Controllers;

use App\Models\HotelOffer;
use Illuminate\Http\Request;

class HotelOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel_offers = HotelOffer::orderBy('id','desc')->get();
        return view('hotel_offers.index',compact('hotel_offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel_offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated_hotel_offers_data = Validator::make($request->all(), [
            'title'                 => 'required',
            'description'    => 'required',
            'date'              => 'required',
            'is_active'            => 'required',
            'hotel_offer_photo' => 'required'
        ]);


         if ($validated_hotel_offers_data->fails()) {
             return redirect()->back()->withErrors($validated_hotel_offers_data)->withInput();

         }else{
             $hotel_offer = new HotelOffer;
             $hotel_offer->title =$request->title;
             $hotel_offer->date =$request->date;
             $hotel_offer->description =$request->description;
             $hotel_offer->is_active = $request->is_active;
             $hotel_offer->save();


             return redirect()->route('hotel_offers.index')->withStatus(__('Hotel Offer Details successfully created.'));

         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HotelOffer  $hotelOffer
     * @return \Illuminate\Http\Response
     */
    public function show(HotelOffer $hotelOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelOffer  $hotelOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelOffer $hotelOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelOffer  $hotelOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelOffer $hotelOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelOffer  $hotelOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelOffer $hotelOffer)
    {
        //
    }
}
