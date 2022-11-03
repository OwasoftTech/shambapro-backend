<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CropField;
use Validator;

class CropFieldController extends Controller
{
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


        CropField::insert([
          'enterprise_id'=> $request->enterprise_id,
          'field_name'=> $request->field_name,
          'field_size'=> $request->field_size,
          'date_of_planting'=> $request->date_of_planting,
          'no_of_plants'=> $request->no_of_plants,
          'plants_type'=> $request->plants_type,
          'variety'=> $request->variety,
          'croping_system'=> $request->croping_system,
          'watering_system'=> $request->watering_system,
          'crop_type'=> $request->crop_type,
          'season_length'=> $request->season_length,
          'cultivation_system'=> $request->cultivation_system,
 
        ]);

                   return response()->json(['message' => 'Created successfully']);

    }


    public function cropfieldList(Request $request)
    {

        $enterprise_id = $request->query('enterprise_id');

       $cropfieldList = CropField::where('enterprise_id',$enterprise_id)->paginate(15);

        return response()->json(['cropfieldList' => $cropfieldList]);


    }
}
