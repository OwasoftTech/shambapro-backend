<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enterprise;
use App\Models\Farm;
use Illuminate\Support\Facades\Auth;
use Validator;


class EnterpriseController extends Controller
{
  public function create(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'enterprise_type' => 'required',
      'enterprise_name' => 'required',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }

    $user = User::find(Auth::user()->id);
    $farm = Farm::where('name', $user->farm_name)->first();

    Enterprise::insert([
      'user_id' => Auth::user()->id,
      'enterprise_type' => $request->enterprise_type,
      'enterprise_name' => $request->enterprise_name,
      'livestock_type' => $request->livestock_type,
      'farm_id' => $farm->id
    ]);

    return response()->json(['message' => 'Created successfully']);
  }

  public function enterpriseList(Request $request)
  {

    $user = User::find(Auth::user()->id);
    $farm = Farm::where('name', $user->farm_name)->first();

    $enterprise  = Enterprise::where('farm_id', $farm->id)->where('user_id',$request->user_id)->paginate(15);

    return response()->json(['enterprise' => $enterprise]);
  }
}
