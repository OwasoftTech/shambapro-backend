<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldPreparation;
use App\Models\Enterprise;
use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class FieldPreparationController extends Controller
{
  
  public function create_soil_test(Request $request)
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
        $obj = new FieldPreparation;
        $obj->date = $request->date;
        $obj->service_provider = $request->service_provider;
        $obj->type = $request->type;
        $obj->result = $request->result;
        $obj->recommendation = $request->recommendation;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->soil_test  = 1;
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

  public function create_land_preparation(Request $request)
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
        $obj = new FieldPreparation;
        $obj->date = $request->date;
        $obj->type = $request->type;
        $obj->acreage = $request->acreage;
        $obj->done_by = $request->done_by;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->land_preparation  = 1;
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

  public function create_soil_amendment(Request $request)
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
        $obj = new FieldPreparation;
        $obj->date = $request->date;
        $obj->name = $request->name;
        $obj->type = $request->type;
        $obj->quantity = $request->quantity;
        $obj->ingredient = $request->ingredient;
        $obj->batch_no = $request->batch_no;
        $obj->dosage = $request->dosage;
        $obj->supplier_name = $request->supplier_name;
        $obj->expiry_date = $request->expiry_date;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->soil_amendment  = 1;
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

   public function create_planting_record(Request $request)
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
        $obj = new FieldPreparation;
        $obj->date = $request->date;
        $obj->type = $request->type;
        $obj->quantity = $request->quantity;
        $obj->done_by = $request->done_by;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->planting_record  = 1;
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

  public function get_soil_test(Request $request)
  {
    try 
    {
      $soil_test =  FieldPreparation::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('soil_test',1)
                      ->select('id','date','service_provider','type','result','recommendation','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $soil_test]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_land_preparation(Request $request)
  {
    try 
    {
      $land_preparation =  FieldPreparation::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('land_preparation',1)
                      ->select('id','date','type','acreage','done_by','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $land_preparation]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_soil_amendment(Request $request)
  {
    try 
    {
      $soil_amendment =  FieldPreparation::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('soil_amendment',1)
                      ->select('id','date','name','type','quantity','ingredient','batch_no','dosage','supplier_name','expiry_date','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $soil_amendment]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_planting_record(Request $request)
  {
    try 
    {
      $planting_record =  FieldPreparation::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('planting_record',1)
                      ->select('id','date','type','quantity','done_by','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $planting_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }




}
