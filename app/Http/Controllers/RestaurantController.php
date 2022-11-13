<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantPhoto;
use App\Models\RestaurantTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::with([
            "restaurant_photos",
            "restaurant_tags",
        ])
            ->get();
        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_restaurants_data = Validator::make($request->all(), [
            'name'              => 'required|unique:restaurants',
            'location'          => 'required',
            'description'       => 'required',
            'discount'          => 'required',
            'latitude'          => 'required',
            'longitude'         => 'required',
            'is_active'         => 'required',
            'youtube_link'      => 'required',
            'restaurant_tags'   => 'required',
            'restaurant_photos' => 'required',
            'contact_no'        => 'required',
            'fb_page'        => 'required',
            'website'        => 'required',

        ]);

        if ($validated_restaurants_data->fails()) {
            return redirect()->back()->withErrors($validated_restaurants_data)->withInput();

        } else {
            $restaurant               = new Restaurant;
            $restaurant->name         = $request->name;
            $restaurant->location     = $request->location;
            $restaurant->description  = $request->description;
            $restaurant->contact_no   = $request->contact_no;
            $restaurant->discount     = $request->discount;
            $restaurant->latitude     = $request->latitude;
            $restaurant->longitude    = $request->longitude;
            $restaurant->youtube_link = $request->youtube_link;
            $restaurant->is_active    = $request->is_active;
            $restaurant->fb_page      = $request->fb_page;
            $restaurant->website      = $request->website;
            $restaurant->save();

            $restaurant_tags = explode(',', $request->input('restaurant_tags'));
            foreach ($restaurant_tags as $tag) {
                $restaurant_tag                = new RestaurantTag();
                $restaurant_tag->name          = $tag;
                $restaurant_tag->restaurant_id = $restaurant->id;
                $restaurant_tag->save();
            }

            foreach ($request->input('restaurant_photos', []) as $file) {
                $restaurant_photos                = new RestaurantPhoto();
                $restaurant_photos->name          = $file;
                $restaurant_photos->restaurant_id = $restaurant->id;
                $restaurant_photos->save();

            }
            return redirect()->route('restaurants.index')->withStatus(__('Restaurant Details successfully created.'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $restaurant                 = Restaurant::find($id);
        $validated_restaurants_data = Validator::make($request->all(), [
            'name'              => 'required',
            'location'          => 'required',
            'description'       => 'required',
            'discount'          => 'required',
            'latitude'          => 'required',
            'longitude'         => 'required',
            'is_active'         => 'required',
            'youtube_link'      => 'required',
            'restaurant_tags'   => 'required',
            'restaurant_photos' => 'required',
            'contact_no'        => 'required',
            'fb_page'        => 'required',
            'website'        => 'required',

        ]);

        if ($validated_restaurants_data->fails()) {

            return redirect()->back()->withErrors($validated_restaurants_data)->withInput();

        } else {
            $restaurant->name         = $request->name;
            $restaurant->location     = $request->location;
            $restaurant->description  = $request->description;
            $restaurant->contact_no   = $request->contact_no;
            $restaurant->discount     = $request->discount;
            $restaurant->latitude     = $request->latitude;
            $restaurant->longitude    = $request->longitude;
            $restaurant->youtube_link = $request->youtube_link;
            $restaurant->is_active    = $request->is_active;
            $restaurant->fb_page      = $request->fb_page;
            $restaurant->website      = $request->website;
            $restaurant->save();

           


            if (count($restaurant->restaurant_photos) > 0) {
                foreach ($restaurant->restaurant_photos as $media) {
                    if (!in_array($media->original_name, $request->input('restaurant_photos'))) {
                        RestaurantPhoto::where('name', $media->original_name)->delete();
                    }
                }
            }

            $media = $restaurant->restaurant_photos->pluck('original_name')->toArray();

            foreach ($request->input('restaurant_photos', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $restaurant_photos           = new RestaurantPhoto();
                    $restaurant_photos->name     = $file;
                    $restaurant_photos->restaurant_id = $restaurant->id;
                    $restaurant_photos->save();
                }
            }

            $restaurant_tags = explode(',', $request->input('restaurant_tags'));
            foreach ($restaurant_tags as $tag) {
                $restaurant_tag                = new RestaurantTag();
                $restaurant_tag->name          = $tag;
                $restaurant_tag->restaurant_id = $restaurant->id;
                $restaurant_tag->save();
            }

            return redirect()->route('restaurants.index')->withStatus(__('Restaurants Details successfully created.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = new Restaurant;

        $restaurant = $restaurant->destroy($id);
        return redirect()->route('restaurants.index')->withStatus(__('Restaurant successfully deleted.'));
    }

    public function store_photos(Request $request)
    {
        $path = public_path('restaurant_photos');

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

    public function remove_restaurant_photos(Request $request)
    {
        if ($request->get('name')) {
            \File::delete(public_path('restaurant_photos/' . $request->get('name')));

            RestaurantPhoto::where('name', $request->get('name'))->delete();
            return response()->json([
                'status' => true,
            ]);
        }

    }

    public function fetch_photos(Request $request)
    {

        $restaurant_photos = RestaurantPhoto::find('restaurant_id', $id)->get();
        return response()->json(['restaurant_photos' => $restaurant_photos]);
    }
}
