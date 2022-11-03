<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enterprise;
use Validator;


class EnterpriseController extends Controller
{
    public function create(Request $request){
       
      $validator = Validator::make($request->all(), [
        'user_id' => 'required',   
        'enterprise_type' => 'required',     
        'enterprise_name' => 'required',           
      ]);

      if ($validator->fails()) {
         $errors = $validator->errors();
         return response()->json(['error' => $errors->toJson()]);
      }

      Enterprise::insert([
        'user_id'=>$request->user_id,
        'enterprise_type'=>$request->enterprise_type,
        'enterprise_name'=>$request->enterprise_name,   
        'livestock_type'=>$request->livestock_type,        

      ]);

           return response()->json(['message' => 'Created successfully']);


    }

    public function enterpriseList(Request $request)
    {

     $user_id = $request->query('user_id');

     $enterprise  = Enterprise::where('user_id',$user_id)->paginate(15);

           return response()->json(['enterprise' => $enterprise]);

    }



}
