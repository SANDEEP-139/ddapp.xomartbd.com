<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\User;
use App\Models\HotelBook;
use App\Models\HotelRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;


class HotelApiController extends Controller
{
    public function hotel_detail(Request $request)
    {
        $validate_hotel = Validator::make($request->all(),
            [
                'hotel_id' => 'required',
            ]);

        if ($validate_hotel->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'validation error',
                'errors'  => $validate_hotel->errors(),
            ], 401);
        }

        try {
            $data              = [];
            $data['user_info'] = User::where("id", $request->user()->id)->first();
            $data['hotels_info'] = Hotel::where(["is_active" => 1, "id" => $request->hotel_id])
                ->with([
                    "hotel_photos",
                    "hotel_services",
                    "hotel_ratings",
                    "hotel_ratings.user",
                    "hotel_tags",
                    "hotel_rooms",
                    "hotel_rooms.hotel_room_photos",
                ])
                ->get();

            return response()->json(
                [
                    "status"  => true,
                    "message" => "Hotel Listed Successfully",
                    "data"    => $data,
                ],
                200
            );
        } catch (\Throwable $error) {
            return response()->json(
                [
                    "status"  => false,
                    "message" => $error->getMessage(),
                ],
                500
            );
        }
    }

    public function hotel_book(Request $request)
    {

        try {
            //Validated
            $validate_hotel_booking = Validator::make($request->all(),
                [
                    'from'          => 'required|date|date_format:Y-m-d',
                    'to'            => 'required|date|date_format:Y-m-d|after:from',
                    'hotel_id'      => 'required',
                    'hotel_room_id' => 'required',
                ]);

            if ($validate_hotel_booking->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'validation error',
                    'errors'  => $validate_hotel_booking->errors(),
                ], 401);
            }

            $all_rooms = HotelRoom::where([
                "hotel_id" => $request->hotel_id,
                "id"       => $request->hotel_room_id,
            ])->select('total', 'discount_price')->first();

            $total_rooms    = $all_rooms->total;
            $avaliable_room = HotelBook::where([
                "hotel_id"      => $request->hotel_id,
                "hotel_room_id" => $request->hotel_room_id,
            ])
                ->whereBetween("from", [$request->from, $request->to])
                ->whereBetween("to", [$request->from, $request->to])
                ->get();

            if ($total_rooms > count($avaliable_room)) {
                $tos           = Carbon::createFromFormat("Y-m-d H:s:i", "$request->from 00:00:00");
                $froms         = Carbon::createFromFormat("Y-m-d H:s:i", "$request->to 00:00:00");
                $diff_in_hours = $tos->diffInDays($froms);

                $hotel_book                = new HotelBook();
                $hotel_book->user_id       = $request->user()->id;
                $hotel_book->hotel_id      = $request->hotel_id;
                $hotel_book->hotel_room_id = $request->hotel_room_id;
                $hotel_book->from          = $request->from;
                $hotel_book->to            = $request->to;
                $hotel_book->price         = $all_rooms->discount_price * $diff_in_hours;
                $hotel_book->book_type     = 0;

                $hotel_book->save();
                return response()->json(
                    [
                        "status"  => true,
                        "message" => "Thank You Booked Successfully",
                        "data"    => $hotel_book,
                    ],
                    200
                );
            } else {
                return response()->json([
                    "status" => false,
                    "data"   => "Sorry Already Booked",
                ], 401);
            }
        } catch (\Throwable $error) {
            return response()->json(
                [
                    "status"  => false,
                    "message" => $error->getMessage(),
                ],
                500
            );
        }
    }
    public function my_hotel_booked_list(Request $request)
    {
        try {

            $user_id = $request->user()->id;
            $data    = HotelRoom::with(['hotel_booked' => function ($q) use ($user_id) {
                $q->where("user_id", $user_id);
            }, 'hotel'])
                ->get();

            return response()->json(
                [
                    "status"  => true,
                    "message" => "Booked Listed Successfully",
                    "data"    => $data,
                ],
                200
            );
        } catch (\Throwable $error) {
            return response()->json(
                [
                    "status"  => false,
                    "message" => $error->getMessage(),
                ],
                500
            );
        }
    }

    public function locations()
    {
        try {

            $data = Hotel::select("location as name")
                ->distinct()
                ->get();

            return response()->json(
                [
                    "status"  => true,
                    "message" => "Location Listed Successfully!",
                    "data"    => $data,
                ],
                200
            );

        } catch (\Throwable $error) {
            return response()->json(
                [
                    "status"  => false,
                    "message" => $error->getMessage(),
                ],
                500
            );
        }
    }

    public function hotel_search_by_location(Request $request)
    {

        //Validated
        $validate_hotel_search = Validator::make($request->all(),
            [
                'location' => 'required',
            ]);

        if ($validate_hotel_search->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'validation error',
                'errors'  => $validate_hotel_search->errors(),
            ], 401);
        }
        try {
            //Validated
            $hotel_data = Hotel::where("location", $request->location)->get();

            return response()->json(
                [
                    "status"  => true,
                    "message" => "Hotels Listed Successfully",
                    "data"    => $hotel_data,
                ],
                200
            );

        } catch (\Throwable $error) {
            return response()->json(
                [
                    "status"  => false,
                    "message" => $error->getMessage(),
                ],
                500
            );
        }

    }

    public function hotel_search_by_name(Request $request)
    {
        //Validated
        $validate_hotel_search = Validator::make($request->all(),
            [
                'name' => 'required',
            ]);

        if ($validate_hotel_search->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'validation error',
                'errors'  => $validate_hotel_search->errors(),
            ], 401);
        }
        try {
            //Validated
            $hotel_data = Hotel::where("name", $request->name)->get();

            return response()->json(
                [
                    "status"  => true,
                    "message" => "Hotels Listed Successfully",
                    "data"    => $hotel_data,
                ],
                200
            );

        } catch (\Throwable $error) {
            return response()->json(
                [
                    "status"  => false,
                    "message" => $error->getMessage(),
                ],
                500
            );
        }
    }

    public function grab_offer_api(Request $request){
        try {
            //Validated
            $validate_hotel_booking = Validator::make($request->all(),
                [
                    
                    'hotel_id'      => 'required',
                    'hotel_room_id' => 'required',
                ]);

            if ($validate_hotel_booking->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'validation error',
                    'errors'  => $validate_hotel_booking->errors(),
                ], 401);
            }

            $hotel_rooms = HotelRoom::where([
                "hotel_id" => $request->hotel_id,
                "id"       => $request->hotel_room_id,
            ])->first();
            
                return response()->json(
                    [
                        "status"  => true,
                        "message" => "Grab Offer Data listed",
                        "data"    => $hotel_rooms,
                    ],
                    200
                );
            
        } catch (\Throwable $error) {
            return response()->json(
                [
                    "status"  => false,
                    "message" => $error->getMessage(),
                ],
                500
            );
        }
       
    }

    public function claim_discount_api(Request $request){
        try {
            //Validated
            $validate_hotel_booking = Validator::make($request->all(),
                [
                    'from'          => 'required|date|date_format:Y-m-d',
                    'to'            => 'required|date|date_format:Y-m-d|after:from',
                    'hotel_id'      => 'required',
                    'hotel_room_id' => 'required',
                ]);

            if ($validate_hotel_booking->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'validation error',
                    'errors'  => $validate_hotel_booking->errors(),
                ], 401);
            }

            $all_rooms = HotelRoom::where([
                "hotel_id" => $request->hotel_id,
                "id"       => $request->hotel_room_id,
            ])->select('total', 'discount_price')->first();

            $total_rooms    = $all_rooms->total;
            $avaliable_room = HotelBook::where([
                "hotel_id"      => $request->hotel_id,
                "hotel_room_id" => $request->hotel_room_id,
            ])
                ->whereBetween("from", [$request->from, $request->to])
                ->whereBetween("to", [$request->from, $request->to])
                ->get();

            if ($total_rooms > count($avaliable_room)) {
                $tos           = Carbon::createFromFormat("Y-m-d H:s:i", "$request->from 00:00:00");
                $froms         = Carbon::createFromFormat("Y-m-d H:s:i", "$request->to 00:00:00");
                $diff_in_hours = $tos->diffInDays($froms);

                $hotel_book                = new HotelBook();
                $hotel_book->user_id       = $request->user()->id;
                $hotel_book->hotel_id      = $request->hotel_id;
                $hotel_book->hotel_room_id = $request->hotel_room_id;
                $hotel_book->from          = $request->from;
                $hotel_book->to            = $request->to;
                $hotel_book->price         = $all_rooms->discount_price * $diff_in_hours;
                $hotel_book->book_type     = 0;

                $hotel_book->save();
                return response()->json(
                    [
                        "status"  => true,
                        "message" => "Succesfully Claimed",
                        "data"    => $hotel_book,
                    ],
                    200
                );
            } else {
                return response()->json([
                    "status" => false,
                    "data"   => "Sorry Already Booked",
                ], 401);
            }
        } catch (\Throwable $error) {
            return response()->json(
                [
                    "status"  => false,
                    "message" => $error->getMessage(),
                ],
                500
            );
        }
    }
}
