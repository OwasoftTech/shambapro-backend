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
use App\Http\Controllers\Api\HealthRecordController;
use App\Http\Controllers\Api\BreedingRecordController;
use App\Http\Controllers\Api\EggRecordController;
use App\Http\Controllers\Api\MeatRecordController;
use App\Http\Controllers\Api\FieldPreparationController;
use App\Http\Controllers\Api\CropManagementRecordController;








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

    Route::post('/add/vaccination/record', [HealthRecordController::class, 'create_vaccination_record']); 
    Route::post('/add/disease/pests/record', [HealthRecordController::class, 'create_disease_pests_record']); 
    Route::post('/add/treatment/record', [HealthRecordController::class, 'create_treatment_record']); 
    Route::post('/add/veterinary/record', [HealthRecordController::class, 'create_veterinary_record']); 


    Route::post('/add/service/register', [BreedingRecordController::class, 'create_service_register']);
    Route::post('/add/calf/birth/register', [BreedingRecordController::class, 'create_calf_birth_register']);
    Route::post('/add/piglet/birth/register', [BreedingRecordController::class, 'create_piglet_birth_register']);
    Route::post('/add/kid/birth/register', [BreedingRecordController::class, 'create_kid_birth_register']);



    Route::post('/add/egg/production', [EggRecordController::class, 'create_egg_production']);


    Route::post('/add/daily/bird/record', [MeatRecordController::class, 'create_daily_bird_record']);
    Route::post('/add/daily/production/record', [MeatRecordController::class, 'create_daily_production_record']);
    Route::post('/add/meat/slaughter/record', [MeatRecordController::class, 'create_meat_slaughter_record']);
    Route::post('/add/wool/production/record', [MeatRecordController::class, 'create_wool_production_record']);


    Route::post('/add/soil/test/record', [FieldPreparationController::class, 'create_soil_test']);
    Route::post('/add/land/preparation/record', [FieldPreparationController::class, 'create_land_preparation']);
    Route::post('/add/soil/amendment/record', [FieldPreparationController::class, 'create_soil_amendment']);
    Route::post('/add/planting/record', [FieldPreparationController::class, 'create_planting_record']);


    Route::post('/add/create/routine/scouting', [CropManagementRecordController::class, 'create_routine_scouting']);
    Route::post('/add/weed/management', [CropManagementRecordController::class, 'create_weed_management']);
    Route::post('/add/pesticide/application', [CropManagementRecordController::class, 'create_pesticide_application']);
    Route::post('/add/fertilizer/application', [CropManagementRecordController::class, 'create_fertilizer_application']);
    Route::post('/add/manure/application', [CropManagementRecordController::class, 'create_manure_application']);
    Route::post('/add/irrigation/record', [CropManagementRecordController::class, 'create_irrigation']);
    Route::post('/add/other/farm/activities', [CropManagementRecordController::class, 'create_other_farm_activities']);
    Route::post('/add/agronomist/inspection', [CropManagementRecordController::class, 'create_agronomist_inspection']);
    Route::post('/add/crop/produce/harvested', [CropManagementRecordController::class, 'create_crop_produce_harvested']);
    Route::post('/add/harvest/consumed/workers', [CropManagementRecordController::class, 'create_harvest_consumed_workers']);


    Route::get('/get/detail/feed/type', [FeedingRecordController::class, 'get_feed_type']);
    Route::get('/get/detail/feeding/record', [FeedingRecordController::class, 'get_feeding_record']);  
    Route::get('/get/detail/grazing/record', [FeedingRecordController::class, 'get_grazing_record']); 
    Route::get('/get/detail/weaning/record', [FeedingRecordController::class, 'get_weaning_record']);
    Route::get('/get/detail/feeding/consumption', [FeedingRecordController::class, 'get_feeding_consumption']);
    Route::get('/get/detail/water/consumption', [FeedingRecordController::class, 'get_water_consumption']);   


    Route::get('/get/detail/animal/milk/record', [MilkRecordController::class, 'get_milk_record']);  
    Route::get('/get/detail/milk/used/record', [MilkRecordController::class, 'get_milk_used']); 


    Route::get('/get/detail/weekly/growth/register', [GrowthDeathRecordController::class, 'get_growth_register']); 
    Route::get('/get/detail/death/register', [GrowthDeathRecordController::class, 'get_death_register']); 
    Route::get('/get/detail/slaughter/record', [GrowthDeathRecordController::class, 'get_slaughter_record']); 

    Route::get('/get/detail/vaccination/record', [HealthRecordController::class, 'get_vaccination_record']); 
    Route::get('/get/detail/disease/pests/record', [HealthRecordController::class, 'get_disease_pests_record']); 
    Route::get('/get/detail/treatment/record', [HealthRecordController::class, 'get_treatment_record']); 
    Route::get('/get/detail/veterinary/record', [HealthRecordController::class, 'get_veterinary_record']); 


    Route::get('/get/detail/service/register', [BreedingRecordController::class, 'get_service_register']);
    Route::get('/get/detail/calf/birth/register', [BreedingRecordController::class, 'get_calf_birth_register']);
    Route::get('/get/detail/piglet/birth/register', [BreedingRecordController::class, 'get_piglet_birth_register']);
    Route::get('/get/detail/kid/birth/register', [BreedingRecordController::class, 'get_kid_birth_register']);



    Route::get('/get/detail/egg/production', [EggRecordController::class, 'get_egg_production']);


    Route::get('/get/detail/daily/bird/record', [MeatRecordController::class, 'get_daily_bird_record']);
    Route::get('/get/detail/daily/production/record', [MeatRecordController::class, 'get_daily_production_record']);
    Route::get('/get/detail/meat/slaughter/record', [MeatRecordController::class, 'get_meat_slaughter_record']);
    Route::get('/get/detail/wool/production/record', [MeatRecordController::class, 'get_wool_production_record']);


    Route::get('/get/detail/soil/test/record', [FieldPreparationController::class, 'get_soil_test']);
    Route::get('/get/detail/land/preparation/record', [FieldPreparationController::class, 'get_land_preparation']);
    Route::get('/get/detail/soil/amendment/record', [FieldPreparationController::class, 'get_soil_amendment']);
    Route::get('/get/detail/planting/record', [FieldPreparationController::class, 'get_planting_record']);


    Route::get('/get/detail/create/routine/scouting', [CropManagementRecordController::class, 'get_routine_scouting']);
    Route::get('/get/detail/weed/management', [CropManagementRecordController::class, 'get_weed_management']);
    Route::get('/get/detail/pesticide/application', [CropManagementRecordController::class, 'get_pesticide_application']);
    Route::get('/get/detail/fertilizer/application', [CropManagementRecordController::class, 'get_fertilizer_application']);
    Route::get('/get/detail/manure/application', [CropManagementRecordController::class, 'get_manure_application']);
    Route::get('/get/detail/irrigation/record', [CropManagementRecordController::class, 'get_irrigation']);
    Route::get('/get/detail/other/farm/activities', [CropManagementRecordController::class, 'get_other_farm_activities']);
    Route::get('/get/detail/agronomist/inspection', [CropManagementRecordController::class, 'get_agronomist_inspection']);
    Route::get('/get/detail/crop/produce/harvested', [CropManagementRecordController::class, 'get_crop_produce_harvested']);
    Route::get('/get/detail/harvest/consumed/workers', [CropManagementRecordController::class, 'get_harvest_consumed_workers']);


   



});

    Route::get('/get/income/statement/details', [TransactionController::class, 'income_statement']); 
    Route::get('/get/balance/sheet/details', [TransactionController::class, 'balance_sheet']); 