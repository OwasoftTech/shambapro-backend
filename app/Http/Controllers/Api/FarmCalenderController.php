<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Jobs;
use App\Models\User;
use App\Models\Farm;
use Auth;


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

    $job_id = $request->query('job_id');


    $job = Jobs::find($job_id);

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
    $job->save();

    return response()->json(['message' => 'Updated Successfully']);
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


  public function jobReview(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'job_id' => 'required',
      'job_completion' => 'required',
      'action' => 'required',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json(['error' => $errors->toJson()]);
    }

    $job = Jobs::whereId($request->job_id)->first();
    if (!$job) {
      return response()->json(['error' => 'Invalid job_id ']);
    }

    $job->job_completion = $request->job_completion;
    $job->action = $request->action;
    $job->save();

    return response()->json(['message' => 'Job Review Added Successfully']);
  }
}
