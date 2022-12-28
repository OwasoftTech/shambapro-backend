<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CropField;
use App\Models\CropFieldHistory;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\FarmStoreSubCategory;

class CropFieldController extends Controller
{

    public function crop_category()
    {
        try 
        {
          $cat =  FarmStoreSubCategory::where('id', '>=', '18')->where('id', '<=', '19')->get();
          return response()->json(['response' => ['status' => true, 'data' => $cat]], JsonResponse::HTTP_OK);
        } 
        catch (Exception $e) 
        {
          return response()->json(['response' => ['status' => false, 'message' => 'Something went wrong!']], JsonResponse::HTTP_BAD_REQUEST);
        }    

    }

    public function create(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
        'enterprise_id' => 'required',   
        'field_name' => 'required',     
        'date_of_planting' => 'required', 
        'no_of_plants' => 'required', 
        'plants_type' => 'required',     
        'variety' => 'required',     
        'croping_system' => 'required',     
        'watering_system' => 'required',     
        'crop_type' => 'required',
        'season_length' => 'required',     
        'cultivation_system' => 'required',     

        ]);

        if ($validator->fails()) {
        $errors = $validator->errors();
        return response()->json(['error' => $errors->toJson()]);
        }


      $obj = new CropField;
      $obj->enterprise_id= $request->enterprise_id;
      $obj->category_id= $request->category_id;
      $obj->field_name= $request->field_name;
      $obj->field_size= $request->field_size;
      $obj->date_of_planting= $request->date_of_planting;
      $obj->no_of_plants= $request->no_of_plants;
      $obj->plants_type= $request->plants_type;
      $obj->variety= $request->variety;
      $obj->croping_system= $request->croping_system;
      $obj->watering_system= $request->watering_system;
      $obj->crop_type= $request->crop_type;
      $obj->season_length= $request->season_length;
      $obj->cultivation_system= $request->cultivation_system;
      $obj->user_id = Auth::user()->id;
      $obj->save();  
        

        $history = new CropFieldHistory;
        $history->cropFieldId = $obj->id;
        $history->no_of_plants = $request->no_of_plants;
        $history->createdby = Auth::user()->id;
        $history->created_at = Carbon::now();
        $history->save();

        return response()->json(['message' => 'Created successfully']);
    }


    public function cropfieldList(Request $request)
    {

        $enterprise_id = $request->query('enterprise_id');
        $category_id = $request->query('category_id');

        $cropfieldList = CropField::where('enterprise_id',$enterprise_id)
                        ->where('category_id',$category_id)
                        ->get();

        return response()->json(['cropfieldList' => $cropfieldList]);
    }

    public function detail($id)
    {
        try
        {
          $crop_detail = CropField::from('crop_field as fs')
                        ->where('fs.id', $id)
                        ->where('fs.user_id', Auth::user()->id)
                        ->select(
                        'fs.*'
                        )  
                        ->get();
           return response()->json(['response' => ['status' => true, 'data' => $crop_detail]], JsonResponse::HTTP_OK);
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
            $addqty = CropField::find($request->id);

            $new_quantity = $addqty->no_of_plants + $request->no_of_plants;
            $addqty->no_of_plants = $new_quantity;  
            /*$addqty->updatedby = Auth::user()->id;*/
            $addqty->updated_at = Carbon::now();
            $addqty->save();
            
              $history = new CropFieldHistory;
              $history->cropFieldId = $addqty->id;
              $history->no_of_plants = $request->no_of_plants;
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
            $crop = CropField::where('id', $request->crop_id)->first();
            $new_quantity = $crop->no_of_plants - $request->no_of_plants;
            $crop->remove_date = $request->remove_date;
            $crop->no_of_plants = $new_quantity;
            $crop->purpose = $request->purpose; 
            $crop->updated_at = Carbon::now();
            $crop->save();
          
          return response()->json(['response' => ['status' => true, 'message' => 'Quantity Remove successfully!']], JsonResponse::HTTP_OK);
        } 
        catch (Exception $e) 
        {
          return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
        }  
    }

   /*  public function remove_quantity(Request $request)
    {
        try
        {
            $addqty = CropField::find($request->id);

            $new_quantity = $addqty->no_of_plants - $request->no_of_plants;
            $addqty->no_of_plants = $new_quantity;  
           
            $addqty->updated_at = Carbon::now();
            $addqty->save();
            
              $history = new CropFieldHistory;
              $history->cropFieldId = $addqty->id;
              $history->no_of_plants = $request->no_of_plants;
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
          $detail = CropField::from('crop_field as fs')
                        ->where('fs.id', $id)
                        ->where('fs.user_id', Auth::user()->id)
                        ->select(
                        'fs.*'
                        )  
                        ->first();
            $history = CropFieldHistory::where('cropFieldId',$detail->id)->get();

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
