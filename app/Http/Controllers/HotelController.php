<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelPhoto;
use App\Models\HotelService;
use App\Models\HotelTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $hotels = Hotel::with([
            "hotel_photos",
            "hotel_services",
            "hotel_ratings",
            "hotel_tags",
        ])
            ->get();
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated_hotels_data = Validator::make($request->all(), [
            'name'           => 'required|unique:hotels',
            'location'       => 'required',
            'description'    => 'required',
            'price'          => 'required',
            'offer_price'    => 'required',
            'discount'       => 'required',
            'latitude'       => 'required',
            'longitude'      => 'required',
            'is_active'      => 'required',
            'email'          => 'required|email',
            'fb_page'        => 'required',
            'website'        => 'required',
            'youtube_link'   => 'required',
            'hotel_tags'     => 'required',
            'hotel_services' => 'required',
            'hotel_photos'   => 'required',
            'contact_no'     => 'required',

        ]);

        if ($validated_hotels_data->fails()) {
            return redirect()->back()->withErrors($validated_hotels_data)->withInput();

        } else {
            $hotel               = new Hotel;
            $hotel->name         = $request->name;
            $hotel->location     = $request->location;
            $hotel->description  = $request->description;
            $hotel->contact_no   = $request->contact_no;
            $hotel->price        = $request->price;
            $hotel->offer_price  = $request->offer_price;
            $hotel->discount     = $request->discount;
            $hotel->latitude     = $request->latitude;
            $hotel->longitude    = $request->longitude;
            $hotel->email        = $request->email;
            $hotel->fb_page      = $request->fb_page;
            $hotel->website      = $request->website;
            $hotel->youtube_link = $request->youtube_link;
            $hotel->is_active    = $request->is_active;
            $hotel->save();

            $hotel_tags = explode(',', $request->input('hotel_tags'));
            foreach ($hotel_tags as $tag) {
                $hotel_tag           = new HotelTag();
                $hotel_tag->name     = $tag;
                $hotel_tag->hotel_id = $hotel->id;
                $hotel_tag->save();
            }

            $hotel_services = explode(',', $request->input('hotel_services'));
            foreach ($hotel_services as $service) {
                $hotel_services           = new HotelService();
                $hotel_services->name     = $service;
                $hotel_services->hotel_id = $hotel->id;
                $hotel_services->save();
            }

            foreach ($request->input('hotel_photos', []) as $file) {
                $hotel_photos           = new HotelPhoto();
                $hotel_photos->name     = $file;
                $hotel_photos->hotel_id = $hotel->id;
                $hotel_photos->save();

            }
            return redirect()->route('hotels.index')->withStatus(__('Hotels Details successfully created.'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hotel                 = Hotel::find($id);
        $validated_hotels_data = Validator::make($request->all(), [
            'name'           => 'required',
            'location'       => 'required',
            'description'    => 'required',
            'price'          => 'required',
            'offer_price'    => 'required',
            'discount'       => 'required',
            'latitude'       => 'required',
            'longitude'      => 'required',
            'is_active'      => 'required',
            'email'          => 'required|email',
            'fb_page'        => 'required',
            'website'        => 'required',
            'youtube_link'   => 'required',
            'hotel_tags'     => 'required',
            'hotel_services' => 'required',
            'hotel_photos'   => 'required',
            'contact_no'     => 'required',

        ]);

        if ($validated_hotels_data->fails()) {

            return redirect()->back()->withErrors($validated_hotels_data)->withInput();

        } else {
            $hotel->name         = $request->name;
            $hotel->location     = $request->location;
            $hotel->description  = $request->description;
            $hotel->contact_no   = $request->contact_no;
            $hotel->price        = $request->price;
            $hotel->offer_price  = $request->offer_price;
            $hotel->discount     = $request->discount;
            $hotel->latitude     = $request->latitude;
            $hotel->longitude    = $request->longitude;
            $hotel->email        = $request->email;
            $hotel->fb_page      = $request->fb_page;
            $hotel->website      = $request->website;
            $hotel->youtube_link = $request->youtube_link;
            $hotel->is_active    = $request->is_active;
            $hotel->save();

            // $hotel_photos = HotelPhoto::where('hotel_id', $id)->get();

            if (count($hotel->hotel_photos) > 0) {
                foreach ($hotel->hotel_photos as $media) {
                    if (!in_array($media->original_name, $request->input('hotel_photos'))) {
                        HotelPhoto::where('name', $media->original_name)->delete();
                    }
                }
            }

            $media = $hotel->hotel_photos->pluck('original_name')->toArray();

            foreach ($request->input('hotel_photos', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $hotel_photos           = new HotelPhoto();
                    $hotel_photos->name     = $file;
                    $hotel_photos->hotel_id = $hotel->id;
                    $hotel_photos->save();
                }
            }
            $hotel_tags = explode(',', $request->input('hotel_tags'));
            foreach ($hotel_tags as $tag) {
                $hotel_tag           = new HotelTag();
                $hotel_tag->name     = $tag;
                $hotel_tag->hotel_id = $hotel->id;
                $hotel_tag->save();
            }

            $hotel_services = explode(',', $request->input('hotel_services'));
            foreach ($hotel_services as $service) {
                $hotel_services           = new HotelService();
                $hotel_services->name     = $service;
                $hotel_services->hotel_id = $hotel->id;
                $hotel_services->save();
            }

            return redirect()->route('hotels.index')->withStatus(__('Hotels Details successfully created.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = new Hotel;

        $hotel = $hotel->destroy($id);
        return redirect()->route('hotels.index')->withStatus(__('Hotel successfully deleted.'));
    }

    public function store_photos(Request $request)
    {
        $path = public_path('hotel_photos');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function remove_hotel_photos(Request $request)
    {
        if ($request->get('name')) {
            \File::delete(public_path('hotel_photos/' . $request->get('name')));

            HotelPhoto::where('name', $request->get('name'))->delete();
            return response()->json([
                'status' => true,
            ]);
        }

    }

    public function fetch_photos(Request $request)
    {

        $hotel_photos = HotelPhoto::find('hotel_id', $id)->get();
        return response()->json(['hotel_photos' => $hotel_photos]);
    }

}
