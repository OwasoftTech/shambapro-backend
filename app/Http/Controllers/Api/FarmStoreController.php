<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FarmStore;
use App\Models\FarmStoreCategory;
use App\Models\FarmStoreType;
use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class FarmStoreController extends Controller
{

  public function farm_store_type()
  {
    try 
    {
      $t_type =  FarmStoreType::get();
      return response()->json(['response' => ['status' => true, 'data' => $t_type]], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => 'Something went wrong!']], JsonResponse::HTTP_BAD_REQUEST);
    }  

  }

  public function farm_store_category($type)
  {
    try 
    {
      $t_cat =  FarmStoreCategory::where('type',$type)->get();
      return response()->json(['response' => ['status' => true, 'data' => $t_cat]], JsonResponse::HTTP_OK);
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
      $type =  FarmStoreType::where('id',$request->type_id)->first();
     
      $t_cat =  FarmStoreCategory::where('type',$request->type_id)->get();

      
        
        $obj = new FarmStore;
          
        $obj->date = $request->date;
        $obj->name = $request->name;
        $obj->price = $request->price;
        $obj->source = $request->source;
        $obj->category_id = $request->category_id;
        
        if($type->id == 5)
        {
          $obj->size = $request->size;
        }  
        
        if($type->id == 6)
        {
          $obj->description = $request->description;
          $obj->quantity = $request->quantity;
        } 

        if($type->id != 5)
        {
          $obj->condition = $request->condition;
        }  
        $obj->type = $request->type_id;
        $obj->user_id = Auth::user()->id;
        $obj->createdby = Auth::user()->id;
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

  public function index()
  {
    try
    {
      $transaction = Transaction::from('transaction as t')
                    ->join('transaction_category as tc', 't.category_id',  'tc.id') 
                    ->join('transaction_type as tt', 't.type',  'tt.id')
                    ->join('payment as pay', 't.payment_method',  'pay.id')
                    ->where('user_id', Auth::user()->id)
                    ->select(
                    'tc.transaction_cat as categoryName',
                    'tt.transaction_type as transactionType',
                    'pay.method as paymentMethod',
                    't.*'
                    )  
                    ->get();
      return response()->json(['response' => ['status' => true, 'data' => $transaction]], JsonResponse::HTTP_OK);
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
      $transaction = Transaction::from('transaction as t')
                    ->join('transaction_category as tc', 't.category_id',  'tc.id') 
                    ->join('transaction_type as tt', 't.type',  'tt.id')
                    ->join('payment as pay', 't.payment_method',  'pay.id')
                    ->where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->select(
                    'tc.transaction_cat as categoryName',
                    'tt.transaction_type as transactionType',
                    'pay.method as paymentMethod',
                    't.*'
                    )  
                    ->first();
      // $transaction = Transaction::where('id', $id)->first();
      $t_cat =  TransactionCategory::where('type',$transaction->type)->get();
      $payment =  PaymentMethod::get();
      $data = [
               'transaction' => $transaction,
               't_cat' => $t_cat,
               'payment' => $payment,
            ];
      return response()->json(['response' => ['status' => true, 'data' => $data]], JsonResponse::HTTP_OK);
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => 'Something went wrong!']], JsonResponse::HTTP_BAD_REQUEST);
    }  
  }


  public function update(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'transaction_date' => 'required',
      'category_id' => 'required',
      'transaction_name' => 'required',
      'item' => 'required',
      'quantity' => 'required',
      'unit_price' => 'required',
      'amount' => 'required',
      'payment_method' => 'required',
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
           $destinationPath = base_path() . '/public/transaction/';
           $fileName = $request->user()->id . time() . rand() . $request->user()->id . '.' . $extension;
           $image->move($destinationPath, $fileName);


           $photo = '/transaction/' . $fileName;
        }

      Transaction::where('id',$request->transaction_id)
      ->update([
        'transaction_date' => $request->transaction_date,
        'category_id' => $request->category_id,
        'transaction_name' => $request->transaction_name,
        'item' => $request->item,
        'quantity' => $request->quantity,
        'unit_price' => $request->unit_price,
        'amount' => $request->amount,
        'payment_method' => $request->payment_method,
        'photo' => $photo,
        'updatedby' => Auth::user()->id,
        'updated_at' => Carbon::now(),
      ]);
      return response()->json(['response' => ['status' => true, 'message' => 'Record Updated successfully']], 
        JsonResponse::HTTP_OK);
    }  
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
      // return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }    

  }

  
}
