<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Socialite;
use Validator;
use __;

class UserApiController extends Controller {
	/**
	 * Create User
	 * @param Request $request
	 * @return User
	 */
	public function register(Request $request) {
		try {
			//Validated
			$validateUser = Validator::make($request->all(),
				[
					'name' => 'required',
					'email' => 'required|email|unique:users,email',
					'password' => 'required',
					'mobile_number' => 'required',
					'gender' => 'required',
					'birth_date' => 'date|date_format:Y-m-d',
				]);

			if ($validateUser->fails()) {
				return response()->json([
					'status' => false,
					'message' => 'validation error',
					'errors' => $validateUser->errors()->first(),
				], 401);
			}

			$referrer_by = '';
			if (__::get($request, 'referrer_code')) {
				$referrer_by = User::whereAffiliateId($request->referrer_code)->exists();
			}

			$filename = '';
			if ($request->hasFile('profile_pic')) {

				$path = public_path('users');

				if (!file_exists($path)) {
					mkdir($path, 0777, true);
				}

				$file = $request->file('profile_pic');

				$filename = uniqid() . '_' . trim($file->getClientOriginalName());

				$file->move($path, $filename);

			}

			$user = new User();
			$user->name = __::get($request, 'name');
			$user->email = __::get($request, 'email');
			$user->password = Hash::make($request->password);
			$user->mobile_number = __::get($request, 'mobile_number');
			$user->gender = __::get($request, 'gender');
			$user->birth_date = __::get($request, 'birth_date');
			$user->city = __::get($request, 'city');
			$user->location = __::get($request, 'location');
			$user->prefer = __::get($request, 'prefer');
			$user->referred_by = ($referrer_by > 0) ? __::get($request, 'referrer_code') : NULL;
			$user->profile_pic = $filename;
			$user->save();

			return response()->json([
				'status' => true,
				'message' => 'User Saved Successfully',
				'token' => $user->createToken("auth_token")->plainTextToken,
			], 200);

		} catch (\Throwable $error) {
			return response()->json([
				'status' => false,
				'message' => $error->getMessage(),
			], 500);
		}
	}

	/*
		           * Login User
		           * @param Request $request
		           * @return User
	*/
	public function login(Request $request) {
		try
		{
			if (__::get($request, 'provider_name')) {

				$validateUser = Validator::make($request->all(),
					[
						'provider_name' => 'required',
						'access_token' => 'required',

					]);
			} else {
				$validateUser = Validator::make($request->all(),
					[
						'email' => 'required|email',
						'password' => 'required',
					]);
			}

			if ($validateUser->fails()) {
				return response()->json([
					'status' => false,
					'message' => 'validation error',
					'errors' => $validateUser->errors(),
				], 401);
			}

			if (__::get($request, 'provider_name')) {
				$token = $request->input('access_token');

				$providerUser = Socialite::driver($request->provider_name)->userFromToken($token);

				$user = User::where('provider_name', $request->provider_name)->where('provider_id', $providerUser->id)->first();

				if ($user == null) {
					$user = new User();
					$user->provider_name = $request->provider_name;
					$user->email = __::get($providerUser, 'email');
					$user->provider_id = __::get($providerUser, 'id');
					$user->avatar = __::get($providerUser, 'avatar');
					$user->profile_url = __::get($providerUser, 'profileUrl');
					$user->name = __::get($providerUser, 'name');
					$user->save();
				}
			} else {
				if (!Auth::attempt($request->only(['email', 'password']))) {
					return response()->json([
						'status' => false,
						'message' => 'Email & Password does not match with our record.',
					], 401);
				}

				$user = User::where('email', $request->email)->first();
			}

			return response()->json([
				'status' => true,
				'message' => 'User Logged In Successfully',
				'token' => $user->createToken("auth_token")->plainTextToken,
			], 200);

		} catch (\Throwable $th) {
			return response()->json([
				'status' => false,
				'message' => $th->getMessage(),
			], 500);
		}
	}

	public function profile(Request $request) {
		try
		{
			$data = User::where("id", $request->user()->id)->first();
			
			return response()->json([
				"status" => true,
				'message' => 'User Profile Listed',
				"data" => $data,
			], 200);
		} catch (\Throwable $th) {
			return response()->json([
				'status' => false,
				'message' => $th->getMessage(),
			], 500);
		}
	}

	public function logout(Request $request) {
		try
		{

			auth()->user()->tokens()->delete();
			return response()->json([
				"status" => true,
				'message' => 'Logout Successfully!',
			], 200);
		} catch (\Throwable $th) {
			return response()->json([
				'status' => false,
				'message' => $th->getMessage(),
			], 500);
		}
	}
}
