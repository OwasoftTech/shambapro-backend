<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CropManagementRecord;
use App\Models\Enterprise;
use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CropManagementRecordController extends Controller
{
  
  public function create_routine_scouting(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->sign_symptoms = $request->sign_symptoms;
        $obj->diagnosis = $request->diagnosis;
        $obj->recommended = $request->recommended;
        $obj->batch_no = $request->batch_no;
        $obj->dosage = $request->dosage;
        $obj->supplier_name = $request->supplier_name;
        $obj->expiry_date = $request->expiry_date;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->routine_scouting  = 1;
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

  public function create_weed_management(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->type = $request->type;
        $obj->name = $request->name;
        $obj->ingredient = $request->ingredient;
        $obj->batch_no = $request->batch_no;
        $obj->dosage = $request->dosage;
        $obj->amount = $request->amount;
        $obj->supplier_name = $request->supplier_name;
        $obj->expiry_date = $request->expiry_date;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->weed_management  = 1;
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

  public function create_pesticide_application(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->method = $request->method;
        $obj->type = $request->type;
        $obj->name = $request->name;
        $obj->ingredient = $request->ingredient;
        $obj->batch_no = $request->batch_no;
        $obj->dosage = $request->dosage;
        $obj->amount = $request->amount;
        $obj->supplier_name = $request->supplier_name;
        $obj->expiry_date = $request->expiry_date;
        $obj->withholding_days = $request->withholding_days;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->pesticide_application  = 1;
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

  public function create_fertilizer_application(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->method = $request->method;
        $obj->type = $request->type;
        $obj->name = $request->name;
        $obj->ingredient = $request->ingredient;
        $obj->batch_no = $request->batch_no;
        $obj->dosage = $request->dosage;
        $obj->amount = $request->amount;
        $obj->supplier_name = $request->supplier_name;
        $obj->expiry_date = $request->expiry_date;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->fertilizer_application  = 1;
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

  public function create_manure_application(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->method = $request->method;
        $obj->type = $request->type;
        $obj->dosage = $request->dosage;
        $obj->amount = $request->amount;
        $obj->supplier_name = $request->supplier_name;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->manure_application  = 1;
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

  public function create_irrigation(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->type = $request->type;
        $obj->recommended = $request->recommended;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->irrigation  = 1;
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

  public function create_other_farm_activities(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->purpose = $request->purpose;
        $obj->observation = $request->observation;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->other_farm_activities  = 1;
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

  public function create_agronomist_inspection(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->purpose = $request->purpose;
        $obj->observation = $request->observation;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->agronomist_inspection  = 1;
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

  public function create_crop_produce_harvested(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->quantity = $request->quantity;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->crop_produce_harvested  = 1;
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

  public function create_harvest_consumed_workers(Request $request)
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
        $obj = new CropManagementRecord;
        $obj->date = $request->date;
        $obj->quantity = $request->quantity;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->harvest_consumed_workers  = 1;
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

  public function get_routine_scouting(Request $request)
  {
    try 
    {
      $routine_scouting =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('routine_scouting',1)
                      ->select('id','date','sign_symptoms','diagnosis','recommended','batch_no','dosage','supplier_name','expiry_date','status','enterprise_id','user_id',
                      'created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $routine_scouting]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_weed_management(Request $request)
  {
    try 
    {
      $weed_management =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('weed_management',1)
                      ->select('id','date','type','name','ingredient','batch_no','dosage','amount','supplier_name','expiry_date','status',
                        'enterprise_id','user_id','created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $weed_management]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_pesticide_application(Request $request)
  {
    try 
    {
      $pesticide_application =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('pesticide_application',1)
                      ->select('id','date','method','type','name','ingredient','batch_no','dosage','amount','supplier_name','expiry_date','withholding_days',
                        'status','enterprise_id','user_id','created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $pesticide_application]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_fertilizer_application(Request $request)
  {
    try 
    {
      $fertilizer_application =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('fertilizer_application',1)
                      ->select('id','date','method','type','name','ingredient','batch_no','dosage','amount','supplier_name','expiry_date',
                        'status','enterprise_id','user_id','created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $fertilizer_application]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_manure_application(Request $request)
  {
    try 
    {
      $manure_application =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('manure_application',1)
                      ->select('id','date','method','type','dosage','amount','supplier_name',
                        'status','enterprise_id','user_id','created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $manure_application]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_irrigation(Request $request)
  {
    try 
    {
      $irrigation =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('irrigation',1)
                      ->select('id','date','type','recommended','status','enterprise_id','user_id','created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $irrigation]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_other_farm_activities(Request $request)
  {
    try 
    {
      $other_farm_activities =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('other_farm_activities',1)
                      ->select('id','date','purpose','observation','status','enterprise_id','user_id','created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $other_farm_activities]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_agronomist_inspection(Request $request)
  {
    try 
    {
      $agronomist_inspection =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('agronomist_inspection',1)
                      ->select('id','date','purpose','observation','status','enterprise_id','user_id','created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $agronomist_inspection]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_crop_produce_harvested(Request $request)
  {
    try 
    {
      $crop_produce_harvested =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('crop_produce_harvested',1)
                      ->select('id','date','quantity','status','enterprise_id','user_id','created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $crop_produce_harvested]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_harvest_consumed_workers(Request $request)
  {
    try 
    {
      $harvest_consumed_workers =  CropManagementRecord::where('user_id',$request->user_id)->where('enterprise_id',$request->enterprise_id)
                      ->where('harvest_consumed_workers',1)
                      ->select('id','date','quantity','status','enterprise_id','user_id','created_by','updated_by','created_at','updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $harvest_consumed_workers]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }


}
