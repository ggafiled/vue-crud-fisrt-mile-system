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

Route::get('/areas', 'App\Http\Controllers\AreaController@index');
Route::get('/bbns', 'App\Http\Controllers\BbnController@index');

Route::get('/classes', 'App\Http\Controllers\ClassesController@index');
Route::get('/sections', 'App\Http\Controllers\SectionController@index');

Route::namespace('App\\Http\\Controllers\\API\V1')->group(function () {
    Route::get('profile', 'ProfileController@profile');
    Route::put('profile', 'ProfileController@updateProfile');
    Route::get('role/list', 'RoleController@list');
    Route::post('change-password', 'ProfileController@changePassword');
    Route::get('permission/list', 'PermissionController@list');
    Route::get('user/list', 'UserController@list');
    Route::get('team/list', 'TeamController@list');
    Route::get('tag/list', 'TagController@list');
    Route::get('category/list', 'CategoryController@list');
    Route::get('buildinglist/nonContract', 'BuildingListController@nonContract');
    Route::post('product/upload', 'ProductController@upload');

    Route::apiResources([
        'user' => 'UserController',
        'product' => 'ProductController',
        'category' => 'CategoryController',
        'tag' => 'TagController',
        'role' => 'RoleController',
        'permission' => 'PermissionController',
        'building' => 'BuildingController',
        'buildinglist' => 'BuildingListController',
        'constarution' => 'ConstarutionController',
        'progress' => 'ProgressController',
        'planing' => 'PlaningController',
        'team' => 'TeamController',
        'dashboard' => 'DashboardController'
    ]);
});
