<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveStockProducts;
use App\Models\LiveStockProductsHistory;
use App\Models\FarmStoreSubCategory;
use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class LiveStockProductsController extends Controller
{
  
  public function livestock_category()
  {
    try 
    {
      $cat =  FarmStoreSubCategory::where('id', '>=', '14')->get();
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
      'date' => 'required',
      'name' => 'required',
      'price' => 'required',
      'source' => 'required',
      'category_id' => 'required'
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }

    try 
    {
      
        $obj = new LiveStockProducts;
        $obj->date = $request->date;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->quantity = $request->quantity;
        $obj->price = $request->price;
        $obj->source = $request->source;
        $obj->status = 1; 
        $obj->category_id = $request->category_id;
        $obj->enterprise_id = $request->enterprise_id;
        $obj->user_id = Auth::user()->id;
        $obj->createdby = Auth::user()->id;
        $obj->created_at = Carbon::now();
        $obj->save();

          $history = new LiveStockProductsHistory;
          $history->LiveStockProductId = $obj->id;
          $history->quantity = $request->quantity;
          $history->price = $request->price;
          $history->enterprise_id = $request->enterprise_id;
          $history->createdby = Auth::user()->id;
          $history->created_at = Carbon::now();
          $history->save();
         
        
      return response()->json(['response' => ['status' => true, 'message' => 'Record Added successfully']], 
        JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
      // return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    

  }

  public function index(Request $request)
  {
    try
    {
      $livestock_products = LiveStockProducts::from('livestock_products as fs')
                    ->leftjoin('farm_store_subcategory as fsc', 'fs.category_id',  'fsc.id') 
                    ->where('fs.enterprise_id', $request->enterprise_id)
                    ->where('fs.category_id', $request->category_id)
                    ->where('fs.user_id', Auth::user()->id)
                    ->where('fs.status', 1)
                    ->select(
                    'fsc.farm_subcat as categoryName',
                    'fsc.id as categoryId',
                    'fs.*'
                    )  
                    ->get(); 

       
            
    return response()->json(['response' => ['status' => true, 'data' => $livestock_products]], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
    return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }  
  }

  public function edit($id)
  {
    try
    {
      $livestock_products = LiveStockProducts::from('livestock_products as fs')
                    ->leftjoin('farm_store_subcategory as fsc', 'fs.category_id',  'fsc.id') 
                    ->where('fs.id', $id)
                    ->where('fs.user_id', Auth::user()->id)
                    ->where('fs.status', 1)
                    ->select(
                    'fsc.farm_subcat as categoryName',
                    'fsc.id as categoryId',
                    'fs.*'
                    )  
                    ->get();
     
      
       return response()->json(['response' => ['status' => true, 'data' => $livestock_products]], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => 'Something went wrong!']], JsonResponse::HTTP_BAD_REQUEST);
    }  
  }


  public function update(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'date' => 'required',
      'name' => 'required',
      'price' => 'required',
      'source' => 'required'
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }

    try 
    {
      $obj = LiveStockProducts::where('id',$request->id)->first();

      $new_quantity = $request->quantity;
      $old_quantity = $obj->quantity;
      
      if($new_quantity != $old_quantity)
      {
        return $obj->quantity;
        $history = new LiveStockProductsHistory;
        $history->LiveStockProductId = $obj->id;
        $history->quantity = $request->quantity;
        $history->price = $request->price;
        $history->createdby = Auth::user()->id;
        $history->created_at = Carbon::now();
        $history->save();
      }  

      $obj->date = $request->date;
      $obj->name = $request->name;
      $obj->description = $request->description;
      $obj->quantity = $request->quantity;
      $obj->price = $request->price;
      $obj->source = $request->source;
      $obj->updatedby = Auth::user()->id;
      $obj->updated_at = Carbon::now();
      $obj->save();

      return response()->json(['response' => ['status' => true, 'message' => 'Record Updated successfully']], 
        JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
      // return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    
  }

  public function detail($id)
  {
    try
    {
      $livestock_products = LiveStockProducts::from('livestock_products as fs')
                    ->join('farm_store_subcategory as fsc', 'fs.category_id',  'fsc.id') 
                    ->where('fs.id', $id)
                    ->where('fs.user_id', Auth::user()->id)
                    ->where('fs.status', 1)
                    ->select(
                    'fsc.farm_subcat as categoryName',
                    'fsc.id as categoryId',
                    'fs.*'
                    )  
                    ->get();
       return response()->json(['response' => ['status' => true, 'data' => $livestock_products]], JsonResponse::HTTP_OK);
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
        $addqty = LiveStockProducts::find($request->id);

        $new_quantity = $addqty->quantity + $request->quantity;

        $new_price = ($addqty->price/$addqty->quantity) * $new_quantity;

        $addqty->price = $new_price;
        $addqty->quantity = $new_quantity;  
        $addqty->updatedby = Auth::user()->id;
        $addqty->updated_at = Carbon::now();
        $addqty->save();
        
          $history = new LiveStockProductsHistory;
          $history->price = $new_price;
          $history->LiveStockProductId = $addqty->id;
          $history->quantity = $request->quantity;
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
        $addqty = LiveStockProducts::find($request->id);

        $new_quantity = $addqty->quantity - $request->quantity;

        $new_price = ($addqty->price/$addqty->quantity) * $new_quantity;

        $addqty->price = $new_price;
        $addqty->quantity = $new_quantity;  
        $addqty->updatedby = Auth::user()->id;
        $addqty->updated_at = Carbon::now();
        $addqty->save();
        
          $history = new LiveStockProductsHistory;
          $history->price = $new_price;
          $history->LiveStockProductId = $addqty->id;
          $history->quantity = $request->quantity;
          $history->createdby = Auth::user()->id;
          $history->created_at = Carbon::now();
          $history->save();
         
        
      
       return response()->json(['response' => ['status' => true, 'message' => 'Quantity Remove successfully!']], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }  
  }

   public function sell_purchase_detail($id)
  {
    try
    {
      $detail = LiveStockProducts::from('livestock_products as fs')
                    ->join('farm_store_subcategory as fsc', 'fs.category_id',  'fsc.id')
                    ->where('fs.id', $id)
                    ->where('fs.user_id', Auth::user()->id)
                    ->where('fs.status', 1)
                    ->select(
                    'fsc.farm_subcat as categoryName',
                    'fsc.id as categoryId',
                    'fs.*'
                    )  
                    ->first();
      $history = LiveStockProductsHistory::where('liveStockProductId',$detail->id)->get();

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
