<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EggRecord;
use App\Models\Enterprise;
use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class EggRecordController extends Controller
{
  
  public function create_egg_production(Request $request)
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
        $obj = new EggRecord;
        $obj->date = $request->date;
        $obj->egg_produced = $request->egg_produced;
        $obj->egg_sold = $request->egg_sold;
        $obj->egg_broken = $request->egg_broken;
        $obj->egg_consumed = $request->egg_consumed;
        $obj->egg_poor_quality = $request->egg_poor_quality;
        $obj->enterprise_id = $request->enterprise_id;
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

  public function get_egg_production(Request $request)
  {
    try 
    {
      $egg_record =  EggRecord::from('egg_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->select('f.id','f.date','f.egg_produced','f.egg_sold','f.egg_broken','f.egg_consumed','f.egg_poor_quality','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $egg_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  
  
  
}
