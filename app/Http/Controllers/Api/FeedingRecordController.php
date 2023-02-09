<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedingRecord;
use App\Models\Enterprise;
use App\Models\User;
use App\Models\FarmStore;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class FeedingRecordController extends Controller
{

  public function get_feed_type()
  {
    try 
    {
      $t_type =  FarmStore::where('category_id',17)->where('subcategory_id',1)->get();
      return response()->json(['response' => ['status' => true, 'data' => $t_type]], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }  

  }
  
  public function create_feeding_record(Request $request)
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
        $obj = new FeedingRecord;
        $obj->date = $request->date;
        $obj->heard_id = $request->heard_id;
        $obj->time = $request->time;
        $obj->feed_type = $request->feed_type;
        $obj->quantity = $request->quantity;
        $obj->left_over = $request->left_over;
        $obj->spoilage = $request->spoilage;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->daily_feeding_record  = 1;
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

  public function create_grazing_record(Request $request)
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
        $obj = new FeedingRecord;
        $obj->date = $request->date;
        $obj->heard_id = $request->heard_id;
        $obj->grazing_from = $request->grazing_from;
        $obj->grazing_to = $request->grazing_to;
        $obj->paddock_id = $request->paddock_id;
        $obj->daily_grazing_record  = 1;
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

  public function create_weaning_record(Request $request)
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
        $obj = new FeedingRecord;
        $obj->date = $request->date;
        $obj->animal_id = $request->animal_id;
        $obj->weaning_weight = $request->weaning_weight;
        $obj->daily_weaning_record  = 1;
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

  public function create_feeding_consumption(Request $request)
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
        $obj = new FeedingRecord;
        $obj->date = $request->date;
        $obj->time = $request->time;
        $obj->feed_type = $request->feed_type;
        $obj->quantity = $request->quantity;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->daily_feed_consumption  = 1;
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

   public function create_water_consumption(Request $request)
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
        $obj = new FeedingRecord;
        $obj->date = $request->date;
        $obj->time = $request->time;
        $obj->quantity = $request->quantity;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->daily_water_consumption  = 1;
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


  public function get_feeding_record(Request $request)
  {
    try 
    {
      $feed_record =  FeedingRecord::from('feeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                      ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->leftjoin('farm_store as fs', 'fs.id', 'f.feed_type')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_feeding_record',1)
                      ->select('f.id','f.date','f.time','fs.name as feed_name','f.quantity','f.left_over','f.spoilage','f.status','u.name as username',
                      'e.enterprise_name','f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $feed_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_grazing_record(Request $request)
  {
    try 
    {
      $grazing_record =  FeedingRecord::from('feeding_records as f')
                        ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_grazing_record',1)
                      ->select('f.id','f.date','f.grazing_from','f.grazing_to','f.status','u.name as username',
                      'e.enterprise_name','f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $grazing_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_weaning_record(Request $request)
  {
    try 
    {
      $feed_record =  FeedingRecord::from('feeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_weaning_record',1)
                      ->select('f.id','f.date','f.animal_id','f.weaning_weight','f.status','e.enterprise_name','u.name as username',
                      'a.animal_name','f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $feed_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_feeding_consumption(Request $request)
  {
    try 
    {
      $feeding_consumption_record =  FeedingRecord::from('feeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->leftjoin('farm_store as fs', 'fs.id', 'f.feed_type')  
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_feed_consumption',1)
                      ->select('f.id','f.date','f.time','fs.name as feed_name','f.quantity','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $feeding_consumption_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function get_water_consumption(Request $request)
  {
    try 
    {
      $water_consumption_record =  FeedingRecord::from('feeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('daily_water_consumption',1)
                      ->select('f.id','f.date','f.time','f.quantity','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();

      return response()->json(['response' => ['status' => true,'data' => $water_consumption_record]],JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }


 

  
}
