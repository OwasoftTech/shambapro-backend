<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Heard;
use App\Models\Farm;
use App\Models\Enterprise;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Models\FarmStoreHistory;
use Carbon\Carbon;


class HeardController extends Controller
{
  public function create(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'user_id' => 'required',
      'enterprise_id' => 'required',
      'heard_name' => 'required',

    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }
    $obj = new Heard;
    
    $obj->user_id =  Auth::user()->id;
    $obj->enterprise_id = $request->enterprise_id;
    $obj->heard_name = $request->heard_name;
    $obj->heard_description =$request->heard_description;
    $obj->save();

    $history = new FarmStoreHistory;
          $history->heard_id = $obj->id;
          $history->subcategory_id = 12;
          $history->date = $request->date;
          $history->name = $request->heard_name;
          $history->quantity =  $request->quantity;
          $history->price = $request->price;
          $history->value = $request->value;
          $history->purpose = $request->purpose;
          $history->created_by = Auth::user()->id;
          $history->created_at = Carbon::now();
          $history->save();

    

    return response()->json(['message' => 'Created successfully']);
  }

  public function heardList(Request $request)
  {
    $heard = Heard::from('heard as hd')
              ->leftjoin('farm_store_history as fsh', 'hd.id',  'fsh.heard_id')
              ->select('fsh.quantity as qunatity','hd.*')
                ->where('hd.enterprise_id', $request->query('enterprise_id'))
                ->where('hd.user_id', $request->query('user_id'))
                ->get();
    return response()->json(['heard' => $heard]);
  }
  public function remove_animal(Request $request)
  {

      try 
      {
        $flock = FarmStoreHistory::where('created_by', auth()->user()->id)->where('subcategory_id',12)
        ->where('heard_id', $request->heard_id)->first();
        //dd($flock);
        $new_quantity = $flock->quantity - $request->quantity;
        $flock->date = $request->remove_date;
        $flock->name = $request->flock_name;
        $flock->price = $request->price;
        $flock->value = $request->value;
        $flock->purpose = $request->purpose;
        $flock->quantity = $new_quantity;
        $flock->updated_at = Carbon::now();
        $flock->save();

        return response()->json(['response' => ['status' => true, 'message' => 'Qunatity remove successfully']], 
        JsonResponse::HTTP_OK);
      }  
      catch (Exception $e) 
      {
       return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]],
       JsonResponse::HTTP_BAD_REQUEST);
      
      } 
      
  } 
  
}