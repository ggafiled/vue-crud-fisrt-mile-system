<?php

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Log::debug('User:' . serialize($request->user()));
    return $request->user();
});

Route::namespace('App\\Http\\Controllers\\API\V1')->group(function () {
    Route::get('teamserways', 'TeamSerwayController@index');
    Route::get('agents', 'AgentController@index');
    Route::get('isps', 'IspController@index');
    Route::get('jobtpyes', 'JobTpyeController@index');
    Route::get('problemsolutions', 'ProblemsolutionController@index');
    Route::get('technicians', 'TechnicianController@index');
    Route::get('areas', 'AreaController@index');
    Route::get('aises', 'AreaAisController@index');
    Route::get('area3bbs', 'Area3BBController@index');
    Route::get('areaTrues', 'AreaTrueController@index');
    Route::get('areaTrueNews', 'AreaTrueNewController@index');
    Route::get('areaAises', 'AreaAisController@index');
    Route::get('areaFiberNets', 'AreaFiberNetController@index');
    Route::get('areaTxrxs', 'AreaTxrxController@index');
    Route::get('areaSymphonys', 'AreaSymphonyController@index');
    Route::get('zones', 'ZoneController@index');
    Route::get('contractTerms', 'ContractTermController@index');
    Route::get('workTimes', 'WorkTimeController@index');
    Route::get('saleFms', 'NameSaleController@index');
    Route::get('spendSpaces', 'PaymentController@index');
    Route::get('bbns', 'BbnController@index');
    Route::get('generatingactions', 'GeneratingactionController@index');
    Route::get('profile', 'ProfileController@profile');
    Route::put('profile', 'ProfileController@updateProfile');
    Route::get('role/list', 'RoleController@list');
    Route::post('change-password', 'ProfileController@changePassword');
    Route::get('permission/list', 'PermissionController@list');
    Route::get('user/list', 'UserController@list');
    Route::get('team/list', 'TeamController@list');
    Route::get('buildinglist/nonContract', 'BuildingListController@nonContract');
    Route::post('planing/loadCoordinatePlanningOfBuilding', 'PlaningController@loadCoordinatePlanningOfBuilding');
    Route::post('backup/actionBackup', 'BackupController@actionBackup');
    Route::get('/constarution/retrieveBuilding', 'ConstarutionController@queryBuilding');
    Route::get('/progress/retrieveBuilding', 'ProgressController@queryProgress');
    Route::get('/planing/retrieveBuilding', 'PlaningController@queryPlaning');
    Route::post('/import/getInfo', 'ImPortFileController@getInfo');
<<<<<<< HEAD
    Route::post('/buildings/import','BuildingController@import');
    Route::post('/users/import','UsersController@import');
=======
    Route::post('/users/import','UsersController@import');

    Route::get('/file-import-export','ContractorController@fileImportExport');
    Route::post('/file-import','ContractorController@fileImport');
    Route::get('/file-export','ContractorController@fileExport');

>>>>>>> f28dfeb234c5cd294e6f813950d80e0eb81aadf3
    // Route::post('close_ticket/{ticket_id}', 'TicketsController@close'); // ปิดตั๋ว
    // Route::get('my_tickets', 'TicketsController@userTickets'); // แสดงตั๋วของผู้ใช้งานคนนั้นๆ
    // Route::get('tickets/{ticket_id}', 'TicketsController@show'); // แสดงหน้าตั๋วอันเดียวตาม ไอดี ที่ส่งมา
    // Route::post('comment', 'CommentsController@postComment');

    Route::apiResources([
        'user' => 'UserController',
        'role' => 'RoleController',
        'permission' => 'PermissionController',
        'building' => 'BuildingController',
        'area3bb' => 'Area3BBController',
        'areatrue' => 'AreaTrueController',
        'areatruenew' => 'AreaTrueNewController',
        'areaais' => 'AreaAisController',
        'areafibernet' => 'AreaFiberNetController',
        'areatxrx' => 'AreaTxrxController',
        'areasymphony' => 'AreaSymphonyController',
        'zone' => 'ZoneController',
        'teamzone' => 'TeamZoneController',
        'contractterm' => 'ContractTermController',
        'worktime' => 'WorkTimeController',
        'payment' => 'PaymentController',
        'salefm' => 'NameSaleController',
        'buildinglist' => 'BuildingListController',
        'constarution' => 'ConstarutionController',
        'progress' => 'ProgressController',
        'planing' => 'PlaningController',
        'contractor' => 'ContractorController',
        'accountant' => 'AccountantController',
        'team' => 'TeamController',
        'dashboard' => 'DashboardController',
        'problemsolution' => 'ProblemsolutionController',
        'technician' => 'TechnicianController',
        'callvers' => 'CallverController',
        'callverstatuses' => 'CallverstatusController',
        'generatingaction' => 'GeneratingactionController',
        'teamserway' => 'TeamSerwayController',
        'status' => 'StatusController',
        'isps' => 'IspController',
        'agent' => 'AgentController',
        // 'tickets' => 'TicketsController',
        'backup' => 'BackupController',
        'logs' => 'LogsController',
<<<<<<< HEAD
        'photo' => 'API\PhotoController'
=======

>>>>>>> f28dfeb234c5cd294e6f813950d80e0eb81aadf3
    ]);
});
