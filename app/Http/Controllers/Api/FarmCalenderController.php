<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Jobs;
use App\Models\User;
use App\Models\Farm;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use PDF;
use File;



class FarmCalenderController extends Controller
{
  public function createJob(Request $request)
  {
   $validator = Validator::make($request->all(), [
      'user_id' => 'required',
      'task' => 'required',
      'reason' => 'required',
      'completion_date' => 'required',
      'activity_date' => 'required',

    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }

    $user = User::find(Auth::user()->id);
    $farm = Farm::where('name', $user->farm_name)->first();

    Jobs::insert([
      'user_id' => $request->user_id,
      'farm_id' => $farm->id,
      'task' => $request->task,
      'reason' => $request->reason,
      'completion_date' => $request->completion_date,
      'activity_date' => $request->activity_date,
      'created_by' => $user->id,
    ]);

    return response()->json(['message' => 'Job/Task Assigned Successfully']);
  }



  public function completeJob(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'job_id' => 'required',
      'comments' => 'required',
      'photo' => 'required',
      'status' => 'required'
    ]);

    $job_id = $request->job_id;


    $job = Jobs::find($job_id);

    if ($job->user_id == Auth::user()->id && strtolower($job->status) != 'completed') {

      if ($request->hasfile('photo')) {
        $image = $request->photo;
        $extension = $image->getClientOriginalExtension();
        $destinationPath = base_path() . '/public/jobs/';
        $fileName = Auth::user()->id . time() . rand() . '.' . $extension;
        $image->move($destinationPath, $fileName);


        $request->photo = '/jobs/' . $fileName;
      }

      $job->status = $request->status;
      $job->photo = $request->photo;
      $job->comments = $request->comments;
      $job->save();

      $response = ['message' => 'Updated Successfully'];
    } else {
      if (strtolower($job->status) == 'completed') {
        $response = ['message' => 'job status is already completed'];
      } else {
        $response = ['message' => 'Job is not assigned to you'];
      }
    }
    return response()->json($response);
  }


  // jobs created by me
  public function myJobs(Request $request)
  {

    $myJobs = Jobs::where('created_by', Auth::user()->id)
      ->get();
    return response()->json(['jobs_created_by_me' => $myJobs]);
  }



  // jobs assign to me
  public function assignedJobs(Request $request)
  {

    $myJobs = Jobs::where('user_id', Auth::user()->id)
      ->get();

    return response()->json(['assigned_jobs' => $myJobs]);
  }

  public function AllJobs(Request $request)
  {
    $user = User::find(Auth::user()->id);
    $farm = Farm::where('name', '=', $user->farm_name)->first();

    $myJobs = Jobs::with('assigned_member')->where('farm_id', $farm->id)
      ->get();

    $myJobs->user = $user;

    return response()->json(['assigned_jobs' => $myJobs]);
  }


  public function jobReview(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'job_id' => 'required',
      'action' => 'required',
      'completion_level' => 'required'
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }

    $job = Jobs::whereId($request->job_id)->first();

    if ($job->created_by == Auth::user()->id) {
      if (!$job) {
        return response()->json(['error' => 'Invalid job_id ']);
      }

      $job->action = $request->action;
      $job->completion_level = $request->completion_level;
      $job->save();
      $response = ['message' => 'Job Review Added Successfully'];
    } else {
      $response = ['message' => 'Job is not created by you'];
    }

    return response()->json($response);
  }

  public function staff_report(Request $request)
  {
    try 
    {
      $current_year = Carbon::today()->format('Y');
      $current_start_date = Carbon::parse('first day of January '. $current_year)->startOfDay();
      $current_end_date = Carbon::parse('last day of December '. $current_year)->endOfDay();

      $user = User::find(1);
      $farm = Farm::where('name', '=', $user->farm_name)->first();

      $alljobs = Jobs::with('assigned_member')->where('farm_id', $farm->id)
        ->get();
      
      $members_total = Jobs::where('farm_id', $farm->id)
                            ->select(DB::raw('count(*) as total'),'user_id')
                            ->groupBy('user_id')
                            ->get();
                            
      $members_verysatisfied = Jobs::where('farm_id', $farm->id)->where('action', 'Very Satisfied')
                              ->groupBy('user_id')->select(DB::raw('count(*) as total'),'user_id')->get();
      $members_fairlysatisfied = Jobs::where('farm_id', $farm->id)->where('action', 'Fairly Satisfied')
                              ->groupBy('user_id')->select(DB::raw('count(*) as total'),'user_id')->get();
      $members_toberepeated = Jobs::where('farm_id', $farm->id)->where('action', 'To Be Repeated')
                              ->groupBy('user_id')->select(DB::raw('count(*) as total'),'user_id')->get();
      $members_tobereallocated = Jobs::where('farm_id', $farm->id)->where('action', 'To Be Reallocated')
                              ->groupBy('user_id')->select(DB::raw('count(*) as total'),'user_id')->get();                                                                                                      
      $pdf = PDF::loadView('reports.staff', compact('alljobs','user','members_total','members_verysatisfied',
        'members_fairlysatisfied','members_toberepeated','members_tobereallocated'));

      return $pdf->setPaper('A4')->download('Staff.pdf');
         
      /*return view('reports.staff', compact('alljobs','user','members_total','members_verysatisfied',
        'members_fairlysatisfied','members_toberepeated','members_tobereallocated'));*/      
      
    } 
    catch (Exception $e) 
    {
      return response()->json(['response' => ['status' => false, 'message' => $e->getMessage()]], JsonResponse::HTTP_BAD_REQUEST);
    }  

  }

}
