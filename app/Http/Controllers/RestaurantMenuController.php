<?php

namespace App\Http\Controllers;

use App\Models\RestaurantMenu;
use App\Models\Restaurant;
use App\Models\RestaurantMenuPhoto;
use App\Models\RestaurantMenuTag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RestaurantMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_menus  = RestaurantMenu::with([
            "restaurant_menu_photos",
            "restaurant_menu_tags",
        ])
        ->get();
        return view('restaurant_menus.index', compact('restaurant_menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::pluck('name','id');
        return view('restaurant_menus.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $validated_restaurant_menus_data = Validator::make($request->all(), [
            'restaurant_id'         => 'required',
            'name'    => 'required',
            'description'    => 'required',
            'discount'                  => 'required',
            'restaurant_menu_photos' => 'required|array|min:1',
            'restaurant_menu_tags'  => 'required',
        ]);

           if ($validated_restaurant_menus_data->fails()) {
               return redirect()->back()->withErrors($validated_restaurant_menus_data)->withInput();

           }else{
               $restaurant_menu = new RestaurantMenu;
               $restaurant_menu->name =$request->name;
               $restaurant_menu->restaurant_id =$request->restaurant_id;
               $restaurant_menu->description =$request->description;
               $restaurant_menu->discount =$request->discount;
               $restaurant_menu->save();



               foreach ($request->input('restaurant_menu_photos', []) as $file) {
                   $restaurant_menu_photos  = new RestaurantMenuPhoto(); 
                   $restaurant_menu_photos->name = $file;
                   $restaurant_menu_photos->restaurant_menu_id = $restaurant_menu->id;
                   $restaurant_menu_photos->save();

               }

               $restaurant_menu_tags = explode(',', $request->input('restaurant_menu_tags'));
               foreach ($restaurant_menu_tags as $tag) {
                   $restaurant_menu_tag  = new RestaurantMenuTag(); 
                   $restaurant_menu_tag->name = $tag;
                   $restaurant_menu_tag->restaurant_menu_id = $restaurant_menu->id;
                   $restaurant_menu_tag->save();
               }
               return redirect()->route('restaurant_menus.index')->withStatus(__('Restaurant Menu Details successfully created.'));

           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestaurantMenu  $restaurantMenu
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantMenu $restaurantMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantMenu  $restaurantMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurants = Restaurant::pluck('name','id');
        $restaurant_menu  = RestaurantMenu::where('id',$id)->with([
            "restaurant_menu_photos",
            "restaurant_menu_tags",
        ])->first();
    
        return view('restaurant_menus.edit', compact('restaurants','restaurant_menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantMenu  $restaurantMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $validated_restaurant_menu_data = Validator::make($request->all(), [
            'restaurant_id'         => 'required',
            'name'    => 'required',
            'description'    => 'required',
            'discount'                  => 'required',
            'restaurant_menu_photos' => 'required|array|min:1',
            'restaurant_menu_tags'  => 'required',
        ]);


           if ($validated_restaurant_menu_data->fails()) {
               return redirect()->back()->withErrors($validated_restaurant_menu_data)->withInput();

           }else{
               $restaurant_menu = RestaurantMenu::find($id);
               $restaurant_menu->restaurant_id =$request->restaurant_id;
               $restaurant_menu->name =$request->name;
               $restaurant_menu->description =$request->description;
               $restaurant_menu->discount =$request->discount;
               $restaurant_menu->save();



               $restaurant_menu_photos = RestaurantMenuPhoto::where('restaurant_menu_id', $id)->pluck('name');

               if (count($restaurant_menu_photos) > 0) {
                   foreach ($restaurant_menu_photos as $media) {
                       if (!in_array($media, $request->input('restaurant_menu_photos', []))) {
                           RestaurantMenuPhoto::where('name', $media)->delete();
                       }
                   }
               }

               foreach ($request->input('restaurant_menu_photos', []) as $file) {
                   $restaurant_menu_photos  = new RestaurantMenuPhoto(); 
                   $restaurant_menu_photos->name = $file;
                   $restaurant_menu_photos->restaurant_menu_id = $restaurant_menu->id;
                   $restaurant_menu_photos->save();
               }

               $restaurant_menu_tags = explode(',', $request->input('restaurant_menu_tags'));
               foreach ($restaurant_menu_tags as $tag) {
                   $restaurant_menu_tag  = new RestaurantMenuTag(); 
                   $restaurant_menu_tag->name = $tag;
                   $restaurant_menu_tag->restaurant_menu_id = $restaurant_menu->id;
                   $restaurant_menu_tag->save();
               }               
               return redirect()->route('restaurant_menus.index')->withStatus(__('Restaurant Menu Details successfully updated.'));

           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestaurantMenu  $restaurantMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant_menu = new RestaurantMenu;

        $restaurant_menu = $restaurant_menu->destroy($id);
        return redirect()->route('restaurant_menus.index')->withStatus(__('Restaurant Menu successfully deleted.'));
    }

        public function store_photos(Request $request)
        {
            $path = public_path('restaurant_menu_photos');

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

        public function remove_restaurant_menu_photos(Request $request)
        {
            if($request->get('name'))
            {
                \File::delete(public_path('restaurant_menu_photos/' . $request->get('name')));
           }
       }

       public function fetch_photos(Request $request){

        $restaurant_menu_photos = RestaurantMenuPhoto::find('restaurant_menu_id', $id)->get();
        return response()->json(['restaurant_menu_photos' => $restaurant_menu_photos]);
    }     
}
