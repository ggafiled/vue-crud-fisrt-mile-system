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
    Route::get('profile', 'ProfileController@profile');
    Route::put('profile', 'ProfileController@updateProfile');
    Route::get('role/list', 'RoleController@list');
    Route::post('change-password', 'ProfileController@changePassword');
    Route::get('permission/list','PermissionController@list');
    Route::get('user/list', 'UserController@list');
    Route::get('team/list', 'TeamController@list');
    Route::get('buildinglist/nonContract', 'BuildingListController@nonContract');

    Route::post('close_ticket/{ticket_id}', 'TicketsController@close'); // ปิดตั๋ว
    Route::get('my_tickets', 'TicketsController@userTickets'); // แสดงตั๋วของผู้ใช้งานคนนั้นๆ
    Route::get('tickets/{ticket_id}', 'TicketsController@show'); // แสดงหน้าตั๋วอันเดียวตาม ไอดี ที่ส่งมา
    Route::post('comment', 'CommentsController@postComment');

Route::apiResources([
        'user' => 'UserController',
        'role' => 'RoleController',
        'permission' => 'PermissionController',
        'building' => 'BuildingController',
        'buildinglist' => 'BuildingListController',
        'constarution' => 'ConstarutionController',
        'progress' => 'ProgressController',
        'planing' => 'PlaningController',
        'team' => 'TeamController',
        'dashboard'=>'DashboardController',
        'tickets' => 'TicketsController'
    ]);
});
