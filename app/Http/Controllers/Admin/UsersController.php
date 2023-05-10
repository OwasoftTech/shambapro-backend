<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\BulkDestroyUser;
use App\Http\Requests\Admin\User\DestroyUser;
use App\Http\Requests\Admin\User\IndexUser;
use App\Http\Requests\Admin\User\StoreUser;
use App\Http\Requests\Admin\User\UpdateUser;
use App\Models\User;
use App\Models\Animals;
use App\Models\Enterprise;
use App\Models\Heard;
use App\Models\Flock;
use App\Models\LiveStockProducts;
use App\Models\LiveStockProductsHistory;
use Illuminate\Support\Facades\Schema;

use App\Models\CropField;
use App\Models\CropManagementRecord;

use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexUser $request
     * @return array|Factory|View
     */


    public function dashboard(IndexUser $request){

        // create and AdminListing instance for a specific model and
        /*$data = AdminListing::create(User::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'farm_name', 'email', 'phone_number', 'role'],

            // set columns to searchIn
            ['id', 'name', 'farm_name', 'email', 'role']
        );*/
        
       $cropfield = CropField::count(); 
       $enterprise = Enterprise::count(); 

       $animals = Animals::count(); 
       $data = User::get();     
       $users = User::count();      
       $livestockenterprise = Enterprise::where('enterprise_type','Livestock')
       ->count(); 
       $cropenterprise = Enterprise::where('enterprise_type','Crop')
       ->count();  
       $totalplants = CropField::where('plants_type','Plants')
       ->count(); 
       $totaltrees = CropField::where('plants_type','Trees')
       ->count(); 
       $flocks = Flock::count(); 
       $heards = Heard::count(); 
       $farm_owners = User::where('role','LIKE','%Farm Owner%')->count(); 
       $farm_managers = User::where('role','LIKE','%Farm Manager%')->count(); 
       $farm_workers = User::where('role','LIKE','%Farm Worker%')->count(); 
       $farm_experts = User::where('role','LIKE','%Farm Expert%')->count(); 
       $store_managers = User::where('role','LIKE','%Store Manager%')->count(); 
       $farm_observers = User::where('role','LIKE','%Farm Observer%')->count(); 

 

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }  

     return view('admin.user.dashboard',['data' => $data,'animals'=>$animals,'enterprise'=>$enterprise,'users'=>$users,'cropfield'=>$cropfield,'livestockenterprise'=>$livestockenterprise,'cropenterprise'=>$cropenterprise,'totalplants'=>$totalplants,'totaltrees'=>$totaltrees,
        'flocks'=>$flocks,'heards'=>$heards,'farm_owners'=>$farm_owners,'farm_managers'=>$farm_managers,'farm_workers'=>$farm_workers,'farm_experts'=>$farm_experts,'store_managers'=>$store_managers,'farm_observers'=>$farm_observers]);

    }

    public function enterprisedetail($id)
    {
        $animals =  Animals::where('enterprise_id',$id)->get();
        $heard =  Heard::where('enterprise_id',$id)->get();
        $flocks =  Flock::where('enterprise_id',$id)->get();
        return view('admin.user.enterprisedetail',['animals'=>$animals,'heard'=>$heard,'flocks'=>$flocks]);
        
    }

    public function cropdashboard(IndexUser $request)
    {
  
       $cropenterprise = Enterprise::where('enterprise_type','Crop')->get(); 
       
       
      return view('admin.user.cropdashboard',['cropenterprise'=>$cropenterprise]);

    }

    public function cropdetail($id)
    {
        $details =  CropField::where('enterprise_id',$id)->get();
        return view('admin.user.cropdetail',['details'=>$details]);
        
    }

    public function livestockdashboard(IndexUser $request)
    {
  
       $livestockenterprise = Enterprise::where('enterprise_type','Livestock')
       ->count();  
        $details = Enterprise::where('enterprise_type','Livestock')
       ->get(); 
        $flocks = Flock::count(); 
       $heards = Heard::count(); 
       $animals = Animals::count(); 
      
      return view('admin.user.livestockdashboard',['animals'=>$animals,'livestockenterprise'=>$livestockenterprise,'flocks'=>$flocks,'heards'=>$heards,'details'=>$details]);
    }

    public function livestockdetail($id)
    {
        $details =  LiveStockProducts::where('enterprise_id',$id)->get();
        return view('admin.user.livestockdetail',['details'=>$details]);
    }




    public function userDetails($user){
             
        $enterprise =Enterprise::where('user_id',$user)->paginate(10); 
        $heard =Heard::where('user_id',$user)->paginate(10);
        $heards =Heard::where('user_id',$user)->get()->pluck('id');
        $animals = Animals::whereIn('heard_id',$heards)->paginate(10);


        return view('admin.user.user-details',compact('enterprise','heard','animals'));
    }
    public function index(IndexUser $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(User::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'farm_name', 'email', 'phone_number', 'role'],

            // set columns to searchIn
            ['id', 'name', 'farm_name', 'email', 'role']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.user.create');

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUser $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreUser $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the User
        $user = User::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @throws AuthorizationException
     * @return void
     */
    public function show(User $user)
    {
        $this->authorize('admin.user.show', $user);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(User $user)
    {
        $this->authorize('admin.user.edit', $user);


        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUser $request
     * @param User $user
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateUser $request, User $user)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values User
        $user->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/users/dashboard'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/users/dashboard');
    }

    


    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyUser $request
     * @param User $user
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(User $user)
    {
            CropField::where('user_id',$user->id)->delete(); 
            CropManagementRecord::where('user_id',$user->id)->delete(); 
            LiveStockProducts::where('user_id',$user->id)->delete();
            LiveStockProductsHistory::where('createdby',$user->id)->delete();

            Animals::where('user_id',$user->id)->delete(); 
            Flock::where('user_id',$user->id)->delete(); 
            Heard::where('user_id',$user->id)->delete();  

            Enterprise::where('user_id',$user->id)->delete(); 
            $user->delete();


        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyUser $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyUser $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    User::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
