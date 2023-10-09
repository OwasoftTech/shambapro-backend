<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flock;
use App\Models\FlockHistory;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\FarmStoreHistory


class FlockController extends Controller
{
  public function create(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'flock_name' => 'required',
      'bread' => 'required',
      'hachting_date' => 'required',
      'number_of_birds' => 'required',
      'user_id' => 'required',
      'enterprise_id' => 'required',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }


      $obj = new Flock;
      $obj->user_id = $request->user_id;
      $obj->enterprise_id = $request->enterprise_id;
      $obj->flock_name = $request->flock_name;
      $obj->bread = $request->bread;
      $obj->hachting_date = $request->hachting_date;
      $obj->number_of_birds = $request->number_of_birds;
      $obj->source_of_birds = $request->source_of_birds;
      $obj->poultry_house_name = $request->poultry_house_name;
      $obj->save();


    // $history = new FlockHistory;
    // $history->flockId = $obj->id;
    // $history->number_of_birds = $request->number_of_birds;
    // $history->createdby = Auth::user()->id;
    // $history->created_at = Carbon::now();
    // $history->save();

    $history = new FarmStoreHistory;
          $history->flock_id = $obj->id;
          $history->subcategory_id = 13;
          $history->date = $request->hachting_date;
          $history->name = $request->flock_name;
          $history->quantity =  $request->number_of_birds;
          $history->price = $request->price;
          $history->value = $request->value;
          $history->purpose = $request->purpose;
          $history->created_by = Auth::user()->id;
          $history->created_at = Carbon::now();
          $history->save();

    return response()->json(['message' => 'Created successfully']);

  }


  public function flockList(Request $request)
  {

    $flocks =  Flock::where('enterprise_id', $request->query('enterprise_id'))
      ->paginate(15);

    return response()->json(['flocks' => $flocks]);
  }

  public function detail($id)
  {
    try
    {
      $flock_detail = Flock::from('flock as fs')
                    ->where('fs.id', $id)
                    ->where('fs.user_id', Auth::user()->id)
                    ->select(
                    'fs.*'
                    )  
                    ->get();
       return response()->json(['response' => ['status' => true, 'data' => $flock_detail]], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => 'Something went wrong!']], JsonResponse::HTTP_BAD_REQUEST);
    }  
  }

  public function add_quantity(Request $request)
  {
    try
    {
        $addqty = Flock::find($request->id);

        $new_quantity = $addqty->number_of_birds + $request->number_of_birds;
        $addqty->number_of_birds = $new_quantity;  
        /*$addqty->updatedby = Auth::user()->id;*/
        $addqty->updated_at = Carbon::now();
        $addqty->save();
        
          $history = new FlockHistory;
          $history->flockId = $addqty->id;
          $history->number_of_birds = $request->number_of_birds;
          $history->createdby = Auth::user()->id;
          $history->created_at = Carbon::now();
          $history->save();
         
        
      
       return response()->json(['response' => ['status' => true, 'message' => 'Quantity Added successfully!']], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }  
  }

  public function remove_quantity(Request $request)
  {
    try
    {
        $flock = FarmStoreHistory::where('created_by', auth()->user()->id)->where('subcategory_id',13)->where('flock_id', $request->flock_id)->first();
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
        
      return response()->json(['response' => ['status' => true, 'message' => 'Quantity Remove successfully!']], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }  
  }

 /* public function remove_quantity(Request $request)
  {
    try
    {
        $addqty = Flock::find($request->id);

        $new_quantity = $addqty->number_of_birds - $request->number_of_birds;
        $addqty->number_of_birds = $new_quantity;  
        
        $addqty->updated_at = Carbon::now();
        $addqty->save();
        
          $history = new FlockHistory;
          $history->flockId = $addqty->id;
          $history->number_of_birds = $request->number_of_birds;
          $history->createdby = Auth::user()->id;
          $history->created_at = Carbon::now();
          $history->save();
         
        
      
       return response()->json(['response' => ['status' => true, 'message' => 'Quantity Remove successfully!']], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }  
  }*/

  public function history($id)
  {
    try
    {
      $detail = Flock::from('flock as fs')
                    ->where('fs.id', $id)
                    ->where('fs.user_id', Auth::user()->id)
                    ->select(
                    'fs.*'
                    )  
                    ->first();
        $history = FlockHistory::where('flockId',$detail->id)->get();

        $data = [
                'detail' => $detail,
                'history' => $history
              ];            

       return response()->json(['response' => ['status' => true, 'data' => $data]], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => 'Something went wrong!']], JsonResponse::HTTP_BAD_REQUEST);
    }  
  }

}
