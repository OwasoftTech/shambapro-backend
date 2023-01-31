<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BreedingRecord;
use App\Models\Enterprise;
use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class BreedingRecordController extends Controller
{
  
  public function create_service_register(Request $request)
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
        $obj = new BreedingRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->date_last = $request->date_last;
        $obj->date_service = $request->date_service;
        $obj->time_service = $request->time_service;
        $obj->date_dying_off = $request->date_dying_off;
        $obj->father_id = $request->father_id;
        $obj->mother_id = $request->mother_id;
        $obj->sex = $request->sex;
        $obj->weight = $request->weight;
        $obj->no_new_born = $request->no_new_born;
        $obj->birth_date = $request->birth_date;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->service_register  = 1;
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

  public function create_calf_birth_register(Request $request)
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
        $obj = new BreedingRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->sex = $request->sex;
        $obj->weight = $request->weight;
        $obj->father_id = $request->father_id;
        $obj->mother_id = $request->mother_id;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->calf_birth_register  = 1;
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

  public function create_piglet_birth_register(Request $request)
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
        $obj = new BreedingRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->sex = $request->sex;
        $obj->weight = $request->weight;
        $obj->father_id = $request->father_id;
        $obj->mother_id = $request->mother_id;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->piglet_birth_register  = 1;
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


  public function create_kid_birth_register(Request $request)
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
        $obj = new BreedingRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->sex = $request->sex;
        $obj->weight = $request->weight;
        $obj->father_id = $request->father_id;
        $obj->mother_id = $request->mother_id;
        $obj->no_new_born = $request->no_new_born;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->kid_birth_register  = 1;
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

  public function get_service_register(Request $request)
  {
    try 
    {
      $service_register =  BreedingRecord::from('breeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.service_register',1)
                      ->select('f.id','f.date','f.animal_id','f.date_last','f.date_service','f.time_service','f.date_dying_off','a.father_id','a.mother_id','f.sex',
                        'f.weight','f.no_new_born','f.birth_date','f.status','e.enterprise_name','u.name as username','a.animal_name','f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $service_register]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_calf_birth_register(Request $request)
  {
    try 
    {
      $calf_birth_register =  BreedingRecord::from('breeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.calf_birth_register',1)
                      ->select('f.id','f.date','f.animal_id','f.sex','f.weight','a.father_id','a.mother_id','f.status','e.enterprise_name','u.name as username','a.animal_name','f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $calf_birth_register]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_piglet_birth_register(Request $request)
  {
    try 
    {
      $piglet_birth_register =  BreedingRecord::from('breeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.piglet_birth_register',1)
                      ->select('f.id','f.date','f.animal_id','f.sex','f.weight','a.father_id','a.mother_id','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $piglet_birth_register]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_kid_birth_register(Request $request)
  {
    try 
    {
      $kid_birth_register =  BreedingRecord::from('breeding_records as f')
                        ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.kid_birth_register',1)
                      ->select('f.id','f.date','f.animal_id','f.sex','f.weight','a.father_id','a.mother_id','f.no_new_born','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $kid_birth_register]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  
  
  
}
