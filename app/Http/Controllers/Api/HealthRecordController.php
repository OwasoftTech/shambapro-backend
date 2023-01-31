<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HealthRecord;
use App\Models\Enterprise;
use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class HealthRecordController extends Controller
{
  
  public function create_vaccination_record(Request $request)
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
        $obj = new HealthRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->name = $request->name;
        $obj->dosage = $request->dosage;
        $obj->batch_number = $request->batch_number;
        $obj->manufacture_date = $request->manufacture_date;
        $obj->expiry_date = $request->expiry_date;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->vaccination_record  = 1;
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

  public function create_disease_pests_record(Request $request)
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
      if($request->hasfile('photo')) 
        {
         $image = $request->photo;
         $extension = $image->getClientOriginalExtension();
         $destinationPath = base_path() . '/public/health/';
         $fileName = $request->user()->id . time() . rand() . $request->user()->id . '.' . $extension;
         $image->move($destinationPath, $fileName);


         $photo = '/health/' . $fileName;
        }

        $obj = new HealthRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->signs_symptoms = $request->signs_symptoms;
        $obj->photo = $photo;
        $obj->diagnosis = $request->diagnosis;
        $obj->recommendations = $request->recommendations;
        $obj->dosage = $request->dosage;
        $obj->treatment_duration = $request->treatment_duration;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->disease_pests_record  = 1;
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

  public function create_treatment_record(Request $request)
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
        $obj = new HealthRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->type = $request->type;
        $obj->name = $request->name;
        $obj->batch_number = $request->batch_number;
        $obj->dosage = $request->dosage;
        $obj->treatment_duration = $request->treatment_duration;
        $obj->withholding_days = $request->withholding_days;
        $obj->date_safe_slaughter = $request->date_safe_slaughter;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->treatment_record  = 1;
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

  public function create_veterinary_record(Request $request)
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
        $obj = new HealthRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->observations = $request->observations;
        $obj->recommendations = $request->recommendations;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->veterinary_record  = 1;
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

  public function get_vaccination_record(Request $request)
  {
    try 
    {
      $vaccination_record =  HealthRecord::from('health_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.vaccination_record',1)
                      ->select('f.id','f.date','f.animal_id','f.name','f.dosage','f.batch_number','f.manufacture_date','f.expiry_date','f.status','e.enterprise_name','u.name as username','a.animal_name','f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $vaccination_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_disease_pests_record(Request $request)
  {
    try 
    {
      $disease_pests_record =  HealthRecord::from('health_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.disease_pests_record',1)
                      ->select('f.id','f.date','f.animal_id','f.signs_symptoms','f.photo','f.diagnosis','f.recommendations','f.dosage','f.treatment_duration',
                        'f.status','e.enterprise_name','u.name as username','a.animal_name','f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $disease_pests_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_treatment_record(Request $request)
  {
    try 
    {
      $treatment_record =  HealthRecord::from('health_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.treatment_record',1)
                      ->select('f.id','f.date','f.animal_id','f.type','f.name','f.batch_number','f.dosage','f.treatment_duration','f.withholding_days',
                        'f.date_safe_slaughter','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $treatment_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_veterinary_record(Request $request)
  {
    try 
    {
      $veterinary_record =  HealthRecord::from('health_records as f')
                       ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.veterinary_record',1)
                      ->select('f.id','f.date','f.animal_id','f.observations','f.recommendations','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $veterinary_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  
  
}
