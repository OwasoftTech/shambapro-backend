<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enterprise;
use App\Models\Farm;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $farm = Farm::where('name', $user->farm_name)->first();

        $enterprise  = Enterprise::where('farm_id', $farm->id)->get();

        $user['enterprise'] = $enterprise;

        return response()->json($user);
    }
}
