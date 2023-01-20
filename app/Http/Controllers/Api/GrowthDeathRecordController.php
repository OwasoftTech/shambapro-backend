<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GrowthDeathRecord;
use App\Models\Enterprise;
use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class GrowthDeathRecordController extends Controller
{
  
  public function create_growth_register(Request $request)
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
          $photo = '';

          if ($request->hasfile('photo')) {
             $image = $request->photo;
             $extension = $image->getClientOriginalExtension();
             $destinationPath = base_path() . '/public/growth_register/';
             $fileName = $request->user()->id . time() . rand() . $request->user()->id . '.' . $extension;
             $image->move($destinationPath, $fileName);


             $photo = '/growth_register/' . $fileName;
          }

        $obj = new GrowthDeathRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->weight = $request->weight;
        $obj->photo = $request->photo;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->weekly_growth_register  = 1;
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

  public function create_death_register(Request $request)
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
        $obj = new GrowthDeathRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->cause_of_death = $request->cause_of_death;
        $obj->disposal_method = $request->disposal_method;
        $obj->death_register  = 1;
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

  public function create_slaughter_record(Request $request)
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
        $obj = new GrowthDeathRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->kill_weight = $request->kill_weight;
        $obj->dressed_weight = $request->dressed_weight;
        $obj->meat_quality = $request->meat_quality;
        $obj->slaughter_record  = 1;
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

  public function get_growth_register(Request $request)
  {
    try 
    {
      $growth_register =  GrowthDeathRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('weekly_growth_register',1)
                      ->select('id','date','animal_id','weight','photo','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $growth_register]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_death_register(Request $request)
  {
    try 
    {
      $death_register =  GrowthDeathRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('death_register',1)
                      ->select('id','date','animal_id','cause_of_death','disposal_method','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $death_register]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_slaughter_record(Request $request)
  {
    try 
    {
      $slaughter_record =  GrowthDeathRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('slaughter_record',1)
                      ->select('id','date','animal_id','kill_weight','dressed_weight','meat_quality','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $slaughter_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  
  
}
