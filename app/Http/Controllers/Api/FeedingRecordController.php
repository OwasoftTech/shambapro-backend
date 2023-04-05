<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedingRecord;
use App\Models\Enterprise;
use App\Models\User;
use App\Models\FarmStore;
use App\Models\MilkRecord;
use App\Models\GrowthDeathRecord;
use App\Models\HealthRecord;
use App\Models\BreedingRecord;
use App\Models\EggRecord;
use App\Models\MeatRecord;
use App\Models\WoolProductionRecord;
use App\Models\FieldPreparation;
use App\Models\CropManagementRecord;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use PDF;
use File;


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
                      ->where('f.user_id',$request->user_id)
                      ->where('f.enterprise_id',$request->enterprise_id)
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

  public function production_report(Request $request)
  {
    try 
    {
      $current_year = Carbon::today()->format('Y');
      $current_start_date = Carbon::parse('first day of January '. $current_year)->startOfDay();
      $current_end_date = Carbon::parse('last day of December '. $current_year)->endOfDay();

      $user = User::where('id',$request->user_id)->first();
      if(isset($user) && $user != null)
      {
      $enterprise = Enterprise::find($request->enterprise_id);

      $feed_record =  FeedingRecord::from('feeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                      ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->leftjoin('farm_store as fs', 'fs.id', 'f.feed_type')
                      ->where('f.user_id',$request->user_id)
                      ->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_feeding_record',1)
                      ->select('f.id','f.date','f.time','fs.name as feed_name','f.quantity','f.left_over','f.spoilage','f.status','u.name as username',
                      'e.enterprise_name','e.livestock_type','f.created_at','f.updated_at')
                      ->get();
      $grazing_record =  FeedingRecord::from('feeding_records as f')
                        ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_grazing_record',1)
                      ->select('f.id','f.date','f.grazing_from','f.grazing_to','f.status','u.name as username',
                      'e.enterprise_name','f.created_at','f.updated_at')
                      ->get();   
      $weaning_record =  FeedingRecord::from('feeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_weaning_record',1)
                      ->select('f.id','f.date','f.animal_id','f.weaning_weight','f.status','e.enterprise_name','u.name as username',
                      'a.animal_name','f.created_at','f.updated_at')
                      ->get();
      $feeding_consumption_record =  FeedingRecord::from('feeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->leftjoin('farm_store as fs', 'fs.id', 'f.feed_type')  
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_feed_consumption',1)
                      ->select('f.id','f.date','f.time','fs.name as feed_name','f.quantity','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();
      $water_consumption_record =  FeedingRecord::from('feeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('daily_water_consumption',1)
                      ->select('f.id','f.date','f.time','f.quantity','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();  
      $milk_record =  MilkRecord::from('milk_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_milk_record',1)
                      ->select('f.id','f.date','f.animal_id','a.animal_name','f.time','f.milk_produced','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();
      $milk_used =  MilkRecord::from('milk_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                      ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.daily_milk_used',1)
                      ->select('f.id','f.date','f.milk_fed','f.milk_consumed','f.milk_loss','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();
      $growth_register =  GrowthDeathRecord::from('growth_death_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')  
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.weekly_growth_register',1)
                      ->select('f.id','f.date','f.animal_id','f.weight','f.photo','f.cause_of_death','f.dressed_weight','f.meat_quality','f.no_of_birds','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get(); 
      $death_register =  GrowthDeathRecord::from('growth_death_records as f')
                    ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id') 
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.death_register',1)
                      ->select('f.id','f.date','f.animal_id','f.cause_of_death','f.disposal_method','f.remarks','f.no_of_birds','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get();
      $slaughter_record =  GrowthDeathRecord::from('growth_death_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.slaughter_record',1)
                      ->select('f.id','f.date','f.animal_id','f.kill_weight','f.dressed_weight','f.meat_quality',
                       'f.no_of_birds','f.weight','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get();   
      $vaccination_record =  HealthRecord::from('health_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.vaccination_record',1)
                      ->select('f.id','f.date','f.animal_id','f.name','f.dosage','f.batch_number','f.manufacture_date','f.expiry_date','f.status','e.enterprise_name','u.name as username','a.animal_name','f.created_at','f.updated_at')
                      ->get();
      $disease_pests_record =  HealthRecord::from('health_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.disease_pests_record',1)
                      ->select('f.id','f.date','f.animal_id','f.signs_symptoms','f.photo','f.diagnosis','f.recommendations','f.dosage','f.treatment_duration',
                        'f.status','e.enterprise_name','u.name as username','a.animal_name','f.created_at','f.updated_at')
                      ->get();
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
      $veterinary_record =  HealthRecord::from('health_records as f')
                       ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.veterinary_record',1)
                      ->select('f.id','f.date','f.animal_id','f.observations','f.recommendations','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get(); 
      $service_register =  BreedingRecord::from('breeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.service_register',1)
                      ->select('f.id','f.date','f.animal_id','f.date_last','f.date_service','f.time_service','f.date_dying_off','a.father_id','a.mother_id','f.sex',
                        'f.weight','f.no_new_born','f.birth_date','f.status','e.enterprise_name','u.name as username','a.animal_name','f.created_at','f.updated_at')
                      ->get();
      $calf_birth_register =  BreedingRecord::from('breeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.calf_birth_register',1)
                      ->select('f.id','f.date','f.animal_id','f.sex','f.weight','a.father_id','a.mother_id','f.status','e.enterprise_name','u.name as username','a.animal_name','f.created_at','f.updated_at')
                      ->get();
      $piglet_birth_register =  BreedingRecord::from('breeding_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.piglet_birth_register',1)
                      ->select('f.id','f.date','f.animal_id','f.sex','f.weight','a.father_id','a.mother_id','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get();
      $kid_birth_register =  BreedingRecord::from('breeding_records as f')
                        ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.kid_birth_register',1)
                      ->select('f.id','f.date','f.animal_id','f.sex','f.weight','a.father_id','a.mother_id','f.no_new_born','f.status','e.enterprise_name','u.name as username','a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get();
      $egg_record =  EggRecord::from('egg_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->select('f.id','f.date','f.egg_produced','f.egg_sold','f.egg_broken','f.egg_consumed','f.egg_poor_quality','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();
      $bird_record =  MeatRecord::from('meat_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.bird_record',1)
                      ->select('f.id','f.date','f.dead','f.removed','f.sold','f.farm_consumption','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();
      $production_record =  MeatRecord::from('meat_records as f')
                    ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                    ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                    ->where('f.production_record',1)
                      ->select('f.id','f.date','f.dead','f.removed','f.sold','f.remarks','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();
      $meat_slaughter_record =  MeatRecord::from('meat_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.slaughter_record',1)
                      ->select('f.id','f.date','f.animal_id','f.no_of_birds','f.kill_weight','f.dressed_weight','f.quality','f.status','e.enterprise_name','u.name as username', 'a.animal_name','f.created_at','f.updated_at')
                      ->get();
      $wool_record =  WoolProductionRecord::from('wool_production_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->leftjoin('animals as a', 'a.id', 'f.animal_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->select('f.id','f.date','f.animal_id','f.weight','f.quality','f.status','e.enterprise_name','u.name as username', 'a.animal_name',
                      'f.created_at','f.updated_at')
                      ->get();
      $soil_test =  FieldPreparation::from('field_preparation as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.soil_test',1)
                      ->select('f.id','f.date','f.service_provider','f.type','f.result','f.recommendation','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();
      $land_preparation =  FieldPreparation::from('field_preparation as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.land_preparation',1)
                      ->select('f.id','f.date','f.type','f.acreage','f.done_by','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();
      $soil_amendment =  FieldPreparation::from('field_preparation as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.soil_amendment',1)
                      ->select('f.id','f.date','f.name','f.type','f.quantity','f.ingredient','f.batch_no','f.dosage','f.supplier_name','f.expiry_date','f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $planting_record =  FieldPreparation::from('field_preparation as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')  
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.planting_record',1)
                      ->select('f.id','f.date','f.type','f.quantity','f.done_by','f.status','e.enterprise_name','u.name as username',
                      'f.created_at','f.updated_at')
                      ->get();
      $routine_scouting =  CropManagementRecord::from('crop_management_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.routine_scouting',1)
                      ->select('f.id','f.date','f.sign_symptoms','f.diagnosis','f.recommended','f.batch_no','f.dosage','f.supplier_name','f.expiry_date','f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $weed_management =  CropManagementRecord::from('crop_management_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')    
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.weed_management',1)
                      ->select('f.id','f.date','f.type','f.name','f.ingredient','f.batch_no','f.dosage','f.amount','f.supplier_name','f.expiry_date','f.status',
                        'e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $pesticide_application =  CropManagementRecord::from('crop_management_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id') 
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.pesticide_application',1)
                      ->select('f.id','f.date','f.method','f.type','f.name','f.ingredient','f.batch_no','f.dosage','f.amount','f.supplier_name','f.expiry_date',
                        'f.withholding_days','f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $fertilizer_application =  CropManagementRecord::from('crop_management_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id') 
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.fertilizer_application',1)
                      ->select('f.id','f.date','f.method','f.type','f.name','f.ingredient','f.batch_no','f.dosage','f.amount','f.supplier_name','f.expiry_date',
                        'f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $manure_application =  CropManagementRecord::from('crop_management_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.manure_application',1)
                      ->select('f.id','f.date','f.method','f.type','f.dosage','f.amount','f.supplier_name',
                        'f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $irrigation =  CropManagementRecord::from('crop_management_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.irrigation',1)
                      ->select('f.id','f.date','f.type','f.recommended','f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $other_farm_activities =  CropManagementRecord::from('crop_management_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.other_farm_activities',1)
                      ->select('f.id','f.date','f.purpose','f.observation','f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $agronomist_inspection =  CropManagementRecord::from('crop_management_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.agronomist_inspection',1)
                      ->select('f.id','f.date','f.purpose','f.observation','f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $crop_produce_harvested =  CropManagementRecord::from('crop_management_records as f')
                        ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                        ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.crop_produce_harvested',1)
                      ->select('f.id','f.date','f.quantity','f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();
      $harvest_consumed_workers =  CropManagementRecord::from('crop_management_records as f')
                      ->leftjoin('enterprise as e', 'e.id', 'f.enterprise_id')
                        ->leftjoin('users as u', 'u.id', 'f.user_id')
                      ->where('f.user_id',$request->user_id)->where('f.enterprise_id',$request->enterprise_id)
                      ->where('f.harvest_consumed_workers',1)
                      ->select('f.id','f.date','f.quantity','f.status','e.enterprise_name','u.name as username','f.created_at','f.updated_at')
                      ->get();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                                                                                                           
      $pdf = PDF::loadView('reports.productionstore', compact('user','enterprise','feed_record','grazing_record',
        'weaning_record','feeding_consumption_record','water_consumption_record','milk_record','milk_used',
        'growth_register','death_register','slaughter_record','vaccination_record','disease_pests_record',
        'treatment_record','veterinary_record','service_register','calf_birth_register','piglet_birth_register','kid_birth_register','egg_record',
        'bird_record','production_record','meat_slaughter_record','wool_record','soil_test','land_preparation','soil_amendment','planting_record',
        'routine_scouting','weed_management','pesticide_application','fertilizer_application','manure_application','irrigation','other_farm_activities',  
        'agronomist_inspection','crop_produce_harvested','harvest_consumed_workers'));

      return $pdf->setPaper('A4')->download('Crop Production Report.pdf');
         
     /* return view('reports.productionstore', compact('user','enterprise','feed_record','grazing_record',
        'weaning_record','feeding_consumption_record','water_consumption_record','milk_record','milk_used',
        'growth_register','death_register','slaughter_record','vaccination_record','disease_pests_record',
        'treatment_record','veterinary_record','service_register','calf_birth_register','piglet_birth_register','kid_birth_register','egg_record',
        'bird_record','production_record','meat_slaughter_record','wool_record','soil_test','land_preparation','soil_amendment','planting_record',
        'routine_scouting','weed_management','pesticide_application','fertilizer_application','manure_application','irrigation','other_farm_activities',  
        'agronomist_inspection','crop_produce_harvested','harvest_consumed_workers')); */   
          
    }
      else{
          echo "User Not Found";
        }  
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }  

  }
 

  
}
