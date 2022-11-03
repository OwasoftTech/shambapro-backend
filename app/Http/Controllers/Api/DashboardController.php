<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enterprise;


class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user_id = $request->query('user_id');


       $user = User::with('enterprise')->find($user_id);

       return $user;

    }
}
