<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flock;
use Validator;


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


    Flock::insert([
      'user_id' => $request->user_id,
      'enterprise_id' => $request->enterprise_id,
      'flock_name' => $request->flock_name,
      'bread' => $request->bread,
      'hachting_date' => $request->hachting_date,
      'number_of_birds' => $request->number_of_birds,
      'source_of_birds' => $request->source_of_birds,
      'poultry_house_name' => $request->poultry_house_name,
    ]);

    return response()->json(['message' => 'Created successfully']);
  }


  public function flockList(Request $request)
  {

    $flocks =  Flock::where('enterprise_id', $request->query('enterprise_id'))
      ->paginate(15);

    return response()->json(['flocks' => $flocks]);
  }
}
