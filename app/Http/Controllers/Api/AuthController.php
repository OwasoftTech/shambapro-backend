<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FarmTeam;
use App\Models\Farm;
use Validator;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
   public function login(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'phone_number' => 'required',
      ]);

      if ($validator->fails()) {
         $errors = $validator->errors();
         return response()->json(['error' => $errors->toJson()]);
      }


      $user = User::where('phone_number', $request->phone_number)
         ->first();
      if ($user) {

         $tokenResult = $user->createToken('Personal Access Token');
         $token = $tokenResult->token;
         $token->expires_at = Carbon::now()->addYear(1);
         $token->save();

         return response()->json(['user_id' => $user->id, 'token' => 'Bearer ' . $tokenResult->accessToken, 'user' => $user]);
      } else {
         return response()->json(['message' => 'User not found', 'status_code' => 100]);
      }
   }


   public function signup(Request $request)
   {

      $validator = Validator::make($request->all(), [
         'phone_number' => 'required|unique:users,phone_number',
         'name' => 'required',
         'farm_name' => 'required',
      ]);

      if ($validator->fails()) {
         $errors = $validator->errors();
         return response()->json(['error' => $errors->toJson()]);
      }


      $user_id = User::insertGetId([
         'phone_number' => $request->phone_number,
         'name' => $request->name,
         'gender' => $request->gender,
         'address' => $request->address,
         'district' => $request->district,
         'country' => $request->country,
         'currency' => $request->currency,
         'depreciation_rate' => $request->depreciation_rate,
         'income_tax_rate' => $request->income_tax_rate,
         'partner_code' => $request->partner_code,
         'agent_code' => $request->agent_code,
         'farm_name' => $request->farm_name,
         'role' => $request->role,
         'email' => $request->email,
      ]);

      $farm = Farm::where('name', $request->farm_name)->first();
      if (!$farm) {
         $farm = Farm::insertGetId([
            'name' => $request->farm_name,
         ]);

         $farm = Farm::find($farm);
      }

      $user = User::find($user_id);
      $tokenResult = $user->createToken('Personal Access Token');
      $token = $tokenResult->token;
      $token->expires_at = Carbon::now()->addYear(1);
      $token->save();

      return response()->json(['message' => 'Signed up successfully', 'user_id' => $user_id, 'farm' => $farm, 'token' => 'Bearer ' . $tokenResult->accessToken]);
   }


   public function inviteFriend(Request $request)
   {

      $validator = Validator::make($request->all(), [
         'phone_number' => 'required|unique:users,phone_number',
         'name' => 'required',
      ]);

      if ($validator->fails()) {
         $errors = $validator->errors();
         return response()->json(['error' => $errors->toJson()]);
      }


      $user = User::find(Auth::user()->id);

      $user_id = User::insertGetId([
         'phone_number' => $request->phone_number,
         'name' => $request->name,
         'farm_name' => $user->farm_name,
         'role' => $request->role,
         'email' => $request->email,
      ]);

      FarmTeam::insert([
         'user_id' => Auth::user()->id,
         'team_member' => $user_id,
      ]);

      return response()->json(['message' => 'Signed Sent Invitaion']);
   }


   public function myTeam(Request $request)
   {
      $user = User::find(Auth::user()->id);
      $my_team = DB::table('users')
         ->select('*')
         ->where('farm_name', $user->farm_name)
         ->get();

      return response()->json(['my_team' => $my_team]);
   }
}
