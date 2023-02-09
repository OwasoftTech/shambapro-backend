<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animals;
use Validator;
use App\Models\Heard;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AnimalController extends Controller
{
   public function create(Request $request)
   {
      $validator = Validator::make($request->all(), [
         
         'bread_type' => 'required',
         'animal_name' => 'required',
         'animal_sex' => 'required',
         'animal_color' => 'required',
         'date_of_birth' => 'required',
         'date_of_purchase' => 'required',
         'father_id' => 'required',
         'mother_id' => 'required',
         /*'quantity' => 'required',*/
         /*'photo' => 'required',*/

      ]);

      if ($validator->fails()) {
         $errors = $validator->errors();
         return response()->json(['error' => $errors->toJson()]);
      }

      $photo = '';

      if ($request->hasfile('photo')) {
         $image = $request->photo;
         $extension = $image->getClientOriginalExtension();
         $destinationPath = base_path() . '/public/animals/';
         $fileName = $request->user()->id . time() . rand() . $request->user()->id . '.' . $extension;
         $image->move($destinationPath, $fileName);


         $photo = '/animals/' . $fileName;
      }


      Animals::insert([
        
         'bread_type' => $request->bread_type,
         'animal_name' => $request->animal_name,
         'animal_sex' => $request->animal_sex,
         'animal_color' => $request->animal_color,
         'date_of_birth' => $request->date_of_birth,
         'date_of_purchase' => $request->date_of_purchase,
         'father_id' => $request->father_id,
         'mother_id' => $request->mother_id,
         'photo' => $photo,
         'quantity' => $request->quantity,
         'user_id' => Auth::user()->id,
         'created_at' => Carbon::now(),
      ]);

      return response()->json(['message' => 'Created successfully']);
   }


   public function animalList(Request $request)
   {

      $heard_id = $request->query('heard_id');

      $animals = Animals::where('heard_id', $heard_id)->get();


      return response()->json(['animals' => $animals]);
   }

   public function remove_animal(Request $request)
   {
      try 
      {
        $animals = Animals::where('id', $request->animal_id)->first();
        $new_quantity = $animals->quantity - $request->quantity;
        $animals->remove_date = $request->remove_date;
        $animals->quantity = $new_quantity;
        $animals->purpose = $request->purpose;
        $animals->updated_at = Carbon::now();
        $animals->save();

        return response()->json(['response' => ['status' => true, 'message' => 'Qunatity remove successfully']], 
        JsonResponse::HTTP_OK);
      }  
      catch (Exception $e) 
      {
       return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]],
       JsonResponse::HTTP_BAD_REQUEST);
      
      } 
      
   }
}
