<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MilkRecord;
use App\Models\Enterprise;
use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class MilkRecordController extends Controller
{
  
  public function create_milk_record(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'date' => 'required',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }

    try 
    {
        $obj = new MilkRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->time = $request->time;
        $obj->milk_produced = $request->milk_produced;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->daily_milk_record  = 1;
        $obj->status = 1;
        $obj->user_id = Auth::user()->id;
        $obj->created_by = Auth::user()->id;
        $obj->created_at = Carbon::now();
        $obj->save();

      return response()->json(['response' => ['status' => true, 'message' => 'Record Added successfully']], 
        JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
      // return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function create_milk_used(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'date' => 'required',
     ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }

    try 
    {
        $obj = new MilkRecord;
        $obj->date = $request->date;
        $obj->heard_id = $request->heard_id;
        $obj->milk_fed = $request->milk_fed;
        $obj->milk_consumed = $request->milk_consumed;
        $obj->milk_loss = $request->milk_loss;
        $obj->daily_milk_used  = 1;
        $obj->user_id = Auth::user()->id;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->status = 1;
        $obj->created_by = Auth::user()->id;
        $obj->created_at = Carbon::now();
        $obj->save();

      return response()->json(['response' => ['status' => true, 'message' => 'Record Added successfully']], 
        JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
      // return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_milk_record(Request $request)
  {
    try 
    {
      $feed_record =  MilkRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('daily_milk_record',1)
                      ->select('id','date','animal_id','time','milk_produced','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $feed_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_milk_used(Request $request)
  {
    try 
    {
      $feed_record =  MilkRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('daily_milk_used',1)
                      ->select('id','date','heard_id','milk_fed','milk_consumed','milk_loss','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $feed_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }
  
}
