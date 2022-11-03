<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animals;
use Validator;
use App\Models\Heard;


class AnimalController extends Controller
{
    public function create(Request $request)
     {
       $validator = Validator::make($request->all(), [
        'heard_id' => 'required',   
        'bread_type' => 'required',     
        'animal_name' => 'required',   
        'animal_sex' => 'required',        
        'animal_color' => 'required',        
        'date_of_birth' => 'required',        
        'date_of_purchase' => 'required', 
        'father_id' => 'required',        
        'mother_id' => 'required',        
        'photo' => 'required',        

        ]);

      if ($validator->fails()) {
         $errors = $validator->errors();
         return response()->json(['error' => $errors->toJson()]);
      }

      $photo = '';

      if($request->hasfile('photo')){
            $image = $request->photo;
            $extension = $image->getClientOriginalExtension();
            $destinationPath = base_path() . '/public/animals/';
            $fileName = $request->user()->id.time().rand(). $request->user()->id .'.'. $extension;
            $image->move($destinationPath, $fileName);
 

            $photo = '/animals/'.$fileName;
        }

      
       Animals::insert([
        'heard_id'=>$request->heard_id,
        'bread_type'=>$request->bread_type,
        'animal_name'=>$request->animal_name,   
        'animal_sex'=>$request->animal_sex,
        'animal_color'=>$request->animal_color,        
        'date_of_birth'=>$request->date_of_birth,        
        'date_of_purchase'=>$request->date_of_purchase, 
        'father_id'=>$request->father_id,        
        'mother_id'=>$request->mother_id, 
        'photo'=>$photo,    


        ]);

           return response()->json(['message' => 'Created successfully']);


     }


     public function animalList(Request $request){

         $user_id = $request->query('user_id');
         $enterprise_id = $request->query('enterprise_id');
         
         $heard = Heard::where('user_id',$user_id)
         ->where('enterprise_id',$enterprise_id)
         ->first();
         $animals = [];
         if($heard){
            $animals =Animals::where('heard_id',$heard->id)->get();

         }

           return response()->json(['animals' => $animals]);

     }
}
