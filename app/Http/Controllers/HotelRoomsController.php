<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelRoom;
use App\Models\HotelRoomPhoto;
use App\Models\User;
use App\Services\FCMService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use __;

class HotelRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hotel_room_offers = HotelRoom::with([
            "hotel_room_photos",
            "hotel",
        ])->get();
        return view('hotel_rooms_offers.index', compact('hotel_room_offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::pluck('name', 'id');
        return view('hotel_rooms_offers.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated_hotel_rooms_data = Validator::make($request->all(), [
            'hotel_id'            => 'required',
            'title'               => 'required',
            'subtitle'            => 'required',
            'description'         => 'required',
            'beds'                => 'required',
            'baths'               => 'required',
            'price'               => 'required',
            'discount_price'      => 'required',
            'discount'            => 'required',
            'total'               => 'required',
            'private_policy'      => 'required',
            'info'                => 'required',
            'hotel_room_photos'   => 'required',
            'start_date_end_date' => 'required',
        ]);

        if ($validated_hotel_rooms_data->fails()) {

            return redirect()->back()->withErrors($validated_hotel_rooms_data)->withInput();

        } else {
            $start_end_dates            = str_replace(' ', '', $request->start_date_end_date);
            $dates                      = explode('-', $start_end_dates);
            $hotel_room                 = new HotelRoom;
            $hotel_room->title          = $request->title;
            $hotel_room->hotel_id       = $request->hotel_id;
            $hotel_room->subtitle       = $request->subtitle;
            $hotel_room->description    = $request->description;
            $hotel_room->beds           = $request->beds;
            $hotel_room->baths          = $request->baths;
            $hotel_room->price          = $request->price;
            $hotel_room->discount_price = $request->discount_price;
            $hotel_room->discount       = $request->discount;
            $hotel_room->total          = $request->total;
            $hotel_room->private_policy = $request->private_policy;
            $hotel_room->info           = $request->info;
            $hotel_room->start_date     = date('Y-m-d', strtotime($dates[0]));
            $hotel_room->end_date       = date('Y-m-d', strtotime($dates[1]));
            $hotel_room->save();

            foreach ($request->input('hotel_room_photos', []) as $file) {
                $hotel_room_photos                = new HotelRoomPhoto();
                $hotel_room_photos->name          = $file;
                $hotel_room_photos->hotel_room_id = $hotel_room->id;
                $hotel_room_photos->save();

            }

            self::sendNotificationrToUser($request->hotel_id);
            return redirect()->route('hotel_room_offers.index')->withStatus(__('Hotels Room Offer Details successfully created.'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HotelRooms  $hotelRooms
     * @return \Illuminate\Http\Response
     */
    public function show(HotelRooms $hotelRooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelRooms  $hotelRooms
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels           = Hotel::pluck('name', 'id');
        $hotel_room_offer = HotelRoom::where('id', $id)->with([
            "hotel_room_photos",
        ])->first();
        $hotel_room_offer->start_end_date = Carbon::parse($hotel_room_offer->start_date)->format('m-d-y') . ' - ' . Carbon::parse($hotel_room_offer->start_date)->format('m-d-y');
        return view('hotel_rooms_offers.edit', compact('hotels', 'hotel_room_offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelRooms  $hotelRooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_hotel_rooms_data = Validator::make($request->all(), [
            'hotel_id'            => 'required',
            'title'               => 'required',
            'subtitle'            => 'required',
            'description'         => 'required',
            'beds'                => 'required',
            'baths'               => 'required',
            'price'               => 'required',
            'discount_price'      => 'required',
            'discount'            => 'required',
            'total'               => 'required',
            'private_policy'      => 'required',
            'info'                => 'required',
            'hotel_room_photos'   => 'required',
            'start_date_end_date' => 'required',
        ]);

        if ($validated_hotel_rooms_data->fails()) {

            return redirect()->back()->withErrors($validated_hotel_rooms_data)->withInput();

        } else {
            $hotel_room                 = HotelRoom::find($id);
            $start_end_dates            = str_replace(' ', '', $request->start_date_end_date);
            $dates                      = explode('-', $start_end_dates);
            $hotel_room->title          = $request->title;
            $hotel_room->hotel_id       = $request->hotel_id;
            $hotel_room->subtitle       = $request->subtitle;
            $hotel_room->description    = $request->description;
            $hotel_room->beds           = $request->beds;
            $hotel_room->baths          = $request->baths;
            $hotel_room->price          = $request->price;
            $hotel_room->discount_price = $request->discount_price;
            $hotel_room->discount       = $request->discount;
            $hotel_room->total          = $request->total;
            $hotel_room->private_policy = $request->private_policy;
            $hotel_room->info           = $request->info;
            $hotel_room->start_date     = date('Y-m-d', strtotime($dates[0]));
            $hotel_room->end_date       = date('Y-m-d', strtotime($dates[1]));
            $hotel_room->save();

            if (count($hotel_room->hotel_room_photos) > 0) {
                foreach ($hotel_room->hotel_room_photos as $media) {
                    if (!in_array($media->original_name, $request->input('hotel_room_photos'))) {
                        HotelPhoto::where('name', $media->original_name)->delete();
                    }
                }
            }

            $media = $hotel_room->hotel_room_photos->pluck('original_name')->toArray();

            foreach ($request->input('hotel_room_photos', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $hotel_room_photos                = new HotelRoomPhoto();
                    $hotel_room_photos->name          = $file;
                    $hotel_room_photos->hotel_room_id = $hotel_room->id;
                    $hotel_room_photos->save();
                }
            }
            self::sendNotificationrToUser($request->hotel_id);
            return redirect()->route('hotel_room_offers.index')->withStatus(__('Hotels Room Offer Details successfully updated.'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelRooms  $hotelRooms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel_rooms = new HotelRoom;

        $hotel_rooms = $hotel_rooms->destroy($id);
        return redirect()->route('hotel_room_offers.index')->withStatus(__('Hotel Room Offer successfully deleted.'));
    }

    public function store_photos(Request $request)
    {
        $path = public_path('hotel_room_photos');

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

    public function remove_hotel_rooms_photos(Request $request)
    {
        if ($request->get('name')) {
            \File::delete(public_path('hotel_room_photos/' . $request->get('name')));

            HotelRoomPhoto::where('name', $request->get('name'))->delete();
            return response()->json([
                'status' => true,
            ]);
        }
    }

    public function fetch_photos(Request $request)
    {

        $hotel_room_photos = HotelRoomPhoto::find('hotel_id', $id)->get();
        return response()->json(['hotel_room_photos' => $hotel_room_photos]);
    }
    // push notification
    public function sendNotificationrToUser($hotel_id)
    {
        // get a user to get the fcm_token that already sent.from mobile apps
        $user = User::get();

        if (__::get($user, 'fcm_token')) {

            $data = HotelRoom::where('hotel_id', $hotel_id)->with([
                "hotel_room_photos",
                "hotel",
            ])->first();

            $title = $data->title;
            $body  = 'Hello [name], we think you would enjoy a vacation with our hotel. Benefit from a discount at ' . $data->hotel->name . ' by booking between' . $data->start_date . ' - ' . $data->start_date . ' Visit our site for more info: ' . $data->hotel->website;
            FCMService::send(
                $user->fcm_token,
                [
                    'title' => $title,
                    'body'  => $body,
                ]
            );
        }

    }
}
