<?php

namespace App\Http\Controllers;

use App\Models\RestaurantMenuFood;
use App\Models\RestaurantMenuFoodPhoto;
use App\Models\Restaurant;
use App\Models\RestaurantMenu;
use App\Models\RestaurantMenuFoodTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RestaurantMenuFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_menu_foods  = RestaurantMenuFood::with([
            "restaurant_menu",
            "restaurant_menu_food_photos",
            "restaurant",
        ])->get();
        return view('restaurant_menu_foods.index', compact('restaurant_menu_foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::pluck('name','id');
        $restaurant_menus = RestaurantMenu::pluck('name','id');
        return view('restaurant_menu_foods.create', compact('restaurants','restaurant_menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $validated_restaurant_menu_foods_data = Validator::make($request->all(), [
            'restaurant_id'         => 'required',
            'restaurant_menu_id'    => 'required',
            'name'    => 'required',
            'description'    => 'required',
            'list'    => 'required',
            'price'    => 'required',
            'discount'              => 'required',
            'discount_price'            => 'required',
            'delivery_charge'                  => 'required',
            'start_date_end_date' => 'required',
            'is_active' => 'required',
        ]);


           if ($validated_restaurant_menu_foods_data->fails()) {
            
               return redirect()->back()->withErrors($validated_restaurant_menu_foods_data)->withInput();

           }else{
            $start_end_dates = str_replace(' ', '', $request->start_date_end_date);
               $dates = explode('-', $start_end_dates); 
               $restaurant_menu_food = new RestaurantMenuFood;
               $restaurant_menu_food->restaurant_id =$request->restaurant_id;
               $restaurant_menu_food->restaurant_menu_id =$request->restaurant_menu_id;
               $restaurant_menu_food->name =$request->name;
               $restaurant_menu_food->description =$request->description;
               $restaurant_menu_food->list =$request->list;
               $restaurant_menu_food->price =$request->price;
               $restaurant_menu_food->discount =$request->discount;
               $restaurant_menu_food->discount_price =$request->discount_price;
               $restaurant_menu_food->delivery_charge =$request->delivery_charge;
               $restaurant_menu_food->start_date = date('Y-m-d',strtotime($dates[0]));
               $restaurant_menu_food->end_date =date('Y-m-d',strtotime($dates[1]));
               $restaurant_menu_food->save();



               foreach ($request->input('restaurant_menu_food_photos', []) as $file) {
                   $restaurant_menu_food_photo  = new RestaurantMenuFoodPhoto(); 
                   $restaurant_menu_food_photo->name = $file;
                   $restaurant_menu_food_photo->restaurant_menu_food_id = $restaurant_menu_food->id;
                   $restaurant_menu_food_photo->save();

               }

               $restaurant_menu_food_tags = explode(',', $request->input('restaurant_menu_food_tags'));
               foreach ($restaurant_menu_food_tags as $tag) {
                   $restaurant_menu_food_tag  = new RestaurantMenuFoodTag(); 
                   $restaurant_menu_food_tag->name = $tag;
                   $restaurant_menu_food_tag->restaurant_menu_food_id = $restaurant_menu_food->id;
                   $restaurant_menu_food_tag->save();
               }
               return redirect()->route('restaurant_menu_foods.index')->withStatus(__('Restaurant Menu Food Details successfully created.'));

           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestaurantMenuFood  $restaurantMenuFood
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantMenuFood $restaurantMenuFood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantMenuFood  $restaurantMenuFood
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $restaurant_menu_food  = RestaurantMenuFood::where('id',$id)->with([
            "restaurant_menu_food_photos",
            "restaurant_menu_food_tags",
        ])->first();
        $restaurant_menu_food->start_end_date = Carbon::parse($restaurant_menu_food->start_date)->format('m-d-y'). ' - ' .Carbon::parse($restaurant_menu_food->start_date)->format('m-d-y');
        $restaurants = Restaurant::pluck('name','id');
        $restaurant_menus = RestaurantMenu::pluck('name','id');
        return view('restaurant_menu_foods.edit', compact('restaurants','restaurant_menus','restaurant_menu_food'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantMenuFood  $restaurantMenuFood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $validated_restaurant_menu_foods_data = Validator::make($request->all(), [
            'restaurant_id'         => 'required',
            'restaurant_menu_id'    => 'required',
            'name'    => 'required',
            'description'    => 'required',
            'list'    => 'required',
            'price'    => 'required',
            'discount'              => 'required',
            'discount_price'            => 'required',
            'delivery_charge'                  => 'required',
            'start_date_end_date' => 'required',
            'is_active' => 'required',
        ]);


           if ($validated_restaurant_menu_foods_data->fails()) {
               return redirect()->back()->withErrors($validated_restaurant_menu_foods_data)->withInput();

           }else{
            $start_end_dates = str_replace(' ', '', $request->start_date_end_date);
               $dates = explode('-', $start_end_dates); 
               $restaurant_menu_food = RestaurantMenuFood::find($id);
               $restaurant_menu_food->restaurant_id =$request->restaurant_id;
               $restaurant_menu_food->restaurant_menu_id =$request->restaurant_menu_id;
               $restaurant_menu_food->name =$request->name;
               $restaurant_menu_food->description =$request->description;
               $restaurant_menu_food->list =$request->list;
               $restaurant_menu_food->price =$request->price;
               $restaurant_menu_food->discount =$request->discount;
               $restaurant_menu_food->discount_price =$request->discount_price;
               $restaurant_menu_food->delivery_charge =$request->delivery_charge;
               $restaurant_menu_food->start_date = date('Y-m-d',strtotime($dates[0]));
               $restaurant_menu_food->end_date =date('Y-m-d',strtotime($dates[1]));
               $restaurant_menu_food->save();



               $restaurant_menu_food_photos = RestaurantMenuFoodPhoto::where('restaurant_menu_food_id', $id)->pluck('name');

               if (count($restaurant_menu_food_photos) > 0) {
                   foreach ($restaurant_menu_food_photos as $media) {
                       if (!in_array($media, $request->input('restaurant_menu_food_photos', []))) {
                           RestaurantMenuFoodPhoto::where('name', $media)->delete();
                       }
                   }
               }
               foreach ($request->input('restaurant_menu_food_photos', []) as $file) {
                   $restaurant_menu_food_photo  = new RestaurantMenuFoodPhoto(); 
                   $restaurant_menu_food_photo->name = $file;
                   $restaurant_menu_food_photo->restaurant_menu_food_id = $restaurant_menu_food->id;
                   $restaurant_menu_food_photo->save();

               }

               $restaurant_menu_food_tags = explode(',', $request->input('restaurant_menu_food_tags'));
               foreach ($restaurant_menu_food_tags as $tag) {
                   $restaurant_menu_food_tag  = new RestaurantMenuFoodTag(); 
                   $restaurant_menu_food_tag->name = $tag;
                   $restaurant_menu_food_tag->restaurant_menu_food_id = $restaurant_menu_food->id;
                   $restaurant_menu_food_tag->save();
               }
               return redirect()->route('restaurant_menu_foods.index')->withStatus(__('Restaurant Menu Food Details successfully created.'));

           }
    }


    public function fetch_restaurant_menu(Request $request)
    {
        $data = RestaurantMenu::where("restaurant_id",$request->restaurant_id)->get(["name", "id"]);

        return response()->json($data);
    }

        public function destroy($id)
        {
            $restaurant_menu_food = new RestaurantMenuFood;

            $restaurant_menu_food = $restaurant_menu_food->destroy($id);
            return redirect()->route('restaurant_menu_foods.index')->withStatus(__('Restaurant Menu food successfully deleted.'));
        }

        public function store_photos(Request $request)
        {
            $path = public_path('restaurant_menu_food_photos');

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

        public function remove_restaurant_menu_food_photos(Request $request)
        {
            if($request->get('name'))
            {
                \File::delete(public_path('restaurant_menu_food_photos/' . $request->get('name')));
           }
       }

       public function fetch_photos(Request $request){

        $restaurant_menu_food_photos = RestaurantMenuFoodPhoto::find('hotel_id', $id)->get();
        return response()->json(['restaurant_menu_food_photos' => $restaurant_menu_food_photos]);
    }    
}
