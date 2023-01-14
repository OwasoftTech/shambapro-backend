<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EnterpriseController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\CropFieldController;
use App\Http\Controllers\Api\HeardController;
use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\FlockController;
use App\Http\Controllers\Api\FarmCalenderController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\FarmStoreController;
use App\Http\Controllers\Api\LiveStockProductsController;
use App\Http\Controllers\Api\FeedingRecordController;
use App\Http\Controllers\Api\MilkRecordController;
use App\Http\Controllers\Api\GrowthDeathRecordController;








/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);


Route::group(['middleware' => ['auth:api']], function () {

    ////////////// Phase 1 /////////////////

    Route::post('/add-enerprise', [EnterpriseController::class, 'create']);
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);


    Route::get('/crop/field/category', [CropFieldController::class, 'crop_category']);
    Route::post('/add-cropfield', [CropFieldController::class, 'create']);

    Route::get('/detail/crop/field/{id}', [CropFieldController::class, 'detail']); 
    Route::post('/add/quantity/crop/field', [CropFieldController::class, 'add_quantity']); 
    Route::post('/remove-crop', [CropFieldController::class, 'remove_quantity']); 
    Route::get('/crop/field/history/{id}', [CropFieldController::class, 'history']); 

    Route::post('/add-heard', [HeardController::class, 'create']);
    Route::post('/add-animal', [AnimalController::class, 'create']);
    Route::post('/remove-animal', [AnimalController::class, 'remove_animal']);

    Route::post('/add-flock', [FlockController::class, 'create']);

    Route::get('/animal-list', [AnimalController::class, 'animalList']);

    Route::get('/heard-list', [HeardController::class, 'heardList']);

    Route::get('/flock-list', [FlockController::class, 'flockList']);
    Route::get('/cropfield-list', [CropFieldController::class, 'cropfieldList']);
    Route::get('/enterprise-list', [EnterpriseController::class, 'enterpriseList']);

    Route::get('/detail/flock/{id}', [FlockController::class, 'detail']); 
    Route::post('/add/quantity/flock', [FlockController::class, 'add_quantity']); 
    Route::post('/remove-flock', [FlockController::class, 'remove_quantity']); 
    Route::get('/flock/history/{id}', [FlockController::class, 'history']); 


    ////////////// Phase 2 /////////////////


    Route::post('/invite-team', [AuthController::class, 'inviteFriend']);
    Route::get('/my-team', [AuthController::class, 'myTeam']);

    Route::post('/create-job', [FarmCalenderController::class, 'createJob']);
    Route::post('/update-job-status', [FarmCalenderController::class, 'completeJob']);
    Route::get('/my-jobs', [FarmCalenderController::class, 'myJobs']);
    Route::get('/all-farm-jobs', [FarmCalenderController::class, 'AllJobs']);
    Route::get('/jobs-assigned-to-me', [FarmCalenderController::class, 'assignedJobs']);
    Route::post('/job-review', [FarmCalenderController::class, 'jobReview']);



    /////////Phase 3 ////////////////////////

    Route::get('/get/transaction/type', [TransactionController::class, 'transaction_type']);
    Route::get('/get/transaction/category/{id}', [TransactionController::class, 'transaction_category']);
    Route::get('/get/payment/method', [TransactionController::class, 'payment']);
    Route::post('/add/transaction', [TransactionController::class, 'create']); 
    Route::get('/get/transaction', [TransactionController::class, 'index']);  
    Route::get('/edit/transaction/{id}', [TransactionController::class, 'edit']);  
    Route::post('/update/transaction', [TransactionController::class, 'update']);
    Route::get('/get/transaction/pdf/{id}', [TransactionController::class, 'download_pdf']); 


    /////////Phase 3////////////////////////

    Route::get('/get/farm/store/type', [FarmStoreController::class, 'farm_store_type']);
    Route::get('/get/farm/store/category/{id}', [FarmStoreController::class, 'farm_store_category']);
    Route::get('/get/farm/store/subcategory/{id}', [FarmStoreController::class, 'farm_store_subcategory']);
    Route::post('/add/farm/store', [FarmStoreController::class, 'create']); 
    Route::get('/get/farm/store', [FarmStoreController::class, 'index']);  
    Route::get('/edit/farm/store/{id}', [FarmStoreController::class, 'edit']);  
    Route::post('/update/farm/store', [FarmStoreController::class, 'update']); 
    Route::post('/delete/farm/store', [FarmStoreController::class, 'delete']);
    Route::get('/detail/farm/store/{id}', [FarmStoreController::class, 'detail']); 
    Route::post('/add/quantity/farm/store', [FarmStoreController::class, 'add_quantity']); 
    Route::post('/remove/quantity/farm/store', [FarmStoreController::class, 'remove_quantity']);  
    Route::get('/get/farmstore/qunatity', [FarmStoreController::class, 'form_store_quantity']); 
    Route::get('/get/farmstore/history', [FarmStoreController::class, 'farmstore_history']);   



    Route::get('/get/livestock/products/category', [LiveStockProductsController::class, 'livestock_category']);
    Route::post('/add/livestock/products', [LiveStockProductsController::class, 'create']); 
    Route::get('/get/livestock/products', [LiveStockProductsController::class, 'index']);  
    Route::get('/edit/livestock/products/{id}', [LiveStockProductsController::class, 'edit']);  
    Route::post('/update/livestock/products', [LiveStockProductsController::class, 'update']); 
    Route::post('/delete/livestock/products', [LiveStockProductsController::class, 'delete']);
    Route::get('/detail/livestock/products/{id}', [LiveStockProductsController::class, 'detail']); 
    Route::post('/add/quantity/livestock', [LiveStockProductsController::class, 'add_quantity']); 
    Route::post('/remove/quantity/livestock', [LiveStockProductsController::class, 'remove_quantity']);
    Route::get('/livestock/history/detail', [LiveStockProductsController::class, 'livestock_history']); 
    Route::get('/get/livestock/qunatity', [LiveStockProductsController::class, 'livestock_quantity']); 


    Route::post('/add/feeding/record', [FeedingRecordController::class, 'create_feeding_record']);  
    Route::post('/add/grazing/record', [FeedingRecordController::class, 'create_grazing_record']); 
    Route::post('/add/weaning/record', [FeedingRecordController::class, 'create_weaning_record']);
    Route::post('/add/feeding/consumption', [FeedingRecordController::class, 'create_feeding_consumption']);
    Route::post('/add/water/consumption', [FeedingRecordController::class, 'create_water_consumption']);   


    Route::post('/add/animal/milk/record', [MilkRecordController::class, 'create_milk_record']);  
    Route::post('/add/milk/used/record', [MilkRecordController::class, 'create_milk_used']); 


    Route::post('/add/weekly/growth/register', [GrowthDeathRecordController::class, 'create_growth_register']); 
    Route::post('/add/death/register', [GrowthDeathRecordController::class, 'create_death_register']); 
    Route::post('/add/slaughter/record', [GrowthDeathRecordController::class, 'create_slaughter_record']); 


});
